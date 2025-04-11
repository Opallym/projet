<?php
namespace Framework;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    public function run(ServerRequestInterface $request): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
    //var_dump($uri);
        if (!empty($uri) && $uri[-1] === "/") 
        {
            return (new Response()) // Crée une nouvelle instance de Response.
                ->withStatus(301) // Définit le code de statut HTTP à 301 (mouvement permanent), indiquant que l'URL a été redirigée.
                ->withHeader('Location', substr($uri, 0, -1)); // Envoie un en-tête de redirection Location pour retirer le slash.
        }

        if ($uri === '/mom-compte') {
            return new Response(200, [], '<h1>Mon compte</h1>'); // Retourne une réponse 200 OK avec du HTML.
        }

        if ($uri === '/vente') {
            return new Response(200, [], '<h1>Cath. vente</h1>'); // Retourne une réponse 200 OK avec du HTML.
        }
        if ($uri === '/vente/maison/8') {
            return new Response(200, [], '<h1>Cath. detail vente</h1>'); // Retourne une réponse 200 OK avec du HTML.
        }

        if ($uri === '/blog') {
            return new Response(200, [], '<h1>Blog</h1>'); // Retourne une réponse 200 OK avec du HTML.
        }
        
        if ($uri === '/home') {
            return new Response(200, [], '<h1>HomePage</h1>'); // Retourne une réponse 200 OK avec du HTML.
        }

        if ($uri === '/faq') {
            return new Response(200, [], '<h1>F.A.Q</h1>'); // Retourne une réponse 200 OK avec du HTML.
        }
    }
}