<?php

namespace App\Checkout;

use Framework\Module;
use Framework\Router;
use Framework\Renderer\RendererInterface;

class CheckoutModule extends Module
{
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('checkout', __DIR__ . '/views');

        $router->get('/checkout', [$this, 'index'], 'checkout.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@checkout/index');
    }
}