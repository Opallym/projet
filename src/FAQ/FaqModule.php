<?php

namespace App\FAQ;

use Framework\Router;
use Framework\Renderer\RendererInterface;

class FaqModule
{
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('faq', __DIR__ . '/views');

        $router->get('/faq', [$this, 'index'], 'faq.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@faq/index');
    }
}
