<?php

namespace App\Cart;

use Framework\Module;
use Framework\Router;
use Framework\Renderer\RendererInterface;
    var_dump('ppp');
class CartModule extends Module
{


    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS = __DIR__ . '/db/seeds';
    
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('cart', __DIR__ . '/views');

        $router->get('/cart', [$this, 'index'], 'cart.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@cart/index');
    }
}
