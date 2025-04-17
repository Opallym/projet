<?php

namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    private $router;
    private $modules = [];

    public function __construct(array $modules = [], array $dependencies = [])
    {
        $this->router = new Router();
        if (array_key_exists('renderer', $dependencies)) {
            $dependencies['renderer']->addGlobal('router', $this->router);
        }
        foreach ($modules as $module) {
            $this->modules[] = new $module($this->router, $dependencies['renderer']);
        }
    }

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        if ($uri === '/index.php') {
            return (new Response()) // Crée une nouvelle instance de Response.
                ->withStatus(301) // Définit le code de statut HTTP à 301 (mouvement permanent), indiquant que l'URL a été redirigée.
                ->withHeader('Location', '/'); // Envoie un en-tête de redirection Location pour retirer le slash.
        }
        $route = $this->router->match($request);
        if (is_null($route)) {
            return new Response(404, [], '<h1>Erreur 404</h1>');
        }

        $params = $route->getParams();
        $request = array_reduce(array_keys($params), function ($request, $key) use ($params) {
            return $request->withAttribute($key, $params[$key]);
        }, $request);
        $response = call_user_func_array($route->getCallback(), [$request]);
        if (is_string($response)) {
            return new Response(200, [], $response);
        } elseif ($response instanceof ResponseInterface) {
            return $response;
        } else {
            throw new \Exception('erreur app.php');
        }
    }

}
