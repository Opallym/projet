<?php

namespace App\Maps;

use Framework\Router;
use Framework\Renderer\RendererInterface;

class MapsModule extends Module
{
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('maps', __DIR__ . '/views');

        $router->get('/maps', [$this, 'index'], 'maps.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@maps/index');
    }
}