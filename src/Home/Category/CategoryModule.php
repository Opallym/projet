<?php

namespace App\Home\Category;

use \App\Home\Category\CategoryAction;
use Framework\Module;

use Framework\Router;
;
use Framework\Renderer\RendererInterface;

class CategoryModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS = __DIR__ . '/db/seeds';
   

    public function __construct( string $prefix, Router $router, RendererInterface $renderer) 
    {
        $renderer->addPath('home/category', __DIR__ . '/views');

        $router->get($prefix , CategoryAction::class, 'category.index');
        $router->get($prefix . '/{slug:[a-z\-0-9]+}', CategoryAction::class, 'category.show');
    }

    
}

