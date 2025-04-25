<?php

namespace App\Home;


use Framework\Module;
use Framework\Router;
use App\Home\Actions\HomeAction;
use Framework\Renderer\RendererInterface;
var_dump('toto');
class HomeModule extends Module
{   
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/Category/config.php';
    
    public function __construct(
        
        $prefix,
        private Router $router,
        private RendererInterface $renderer,
        
    ) {
        $this->renderer->addPath('home', __DIR__ . '/views');

        $router->get($prefix, HomeAction::class, 'home.index');
    }
}
