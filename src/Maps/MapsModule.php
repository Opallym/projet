<?php

namespace App\Maps;

use Framework\Module;
use Framework\Router;
use Framework\Renderer\RendererInterface;

class MapsModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS = __DIR__ . '/db/seeds';

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