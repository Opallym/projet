<?php

namespace App\Contact;

use Framework\Router;
use Framework\Renderer\RendererInterface;

class ContactModule
{
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('contact', __DIR__ . '/views');

        $router->get('/contact', [$this, 'index'], 'contact.index');
    }

    public function index(): string
    {
        return $this->renderer->render('@contact/index');
    }
}