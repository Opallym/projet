<?php

namespace App\Admin;


use Framework\Module;
use Framework\Router;
use App\Admin\AdminAction;
use Framework\Renderer\RendererInterface;

class AdminModule extends Module
{
    public function __construct( string $prefix, Router $router, RendererInterface $renderer) 
    {
        $renderer->addPath('admin', __DIR__ . '/views');

        $router->get($prefix , AdminAction::class, 'admin.index');
        $router->get($prefix . '/{slug:[a-z\-0-9]+}', AdminAction::class, 'admin.show');
    }
}
