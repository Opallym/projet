<?php

namespace App\Properties;

use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Router;

class PropertiesModule extends Module

{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS = __DIR__ . '/db/seeds';
    
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('cart', __DIR__ . '/views');

        $router->get('/properties', [$this, 'index'], 'properties.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@properties/index');
    }
}
