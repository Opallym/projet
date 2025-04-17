<?php

namespace App\Home;

use Framework\Router;
use Framework\Renderer\RendererInterface;

class HomeModule
{
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('home', __DIR__ . '/views');

        $router->get('/', [$this, 'index'], 'home.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@home/index');
    }

}
