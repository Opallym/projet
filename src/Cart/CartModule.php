<?php

namespace App\Cart;

use Framework\Router;
use Framework\Renderer\RendererInterface;

class CartModule
{
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
