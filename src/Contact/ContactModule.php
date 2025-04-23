<?php

namespace App\Contact;

use Framework\Module;
use Framework\Router;
use Framework\Renderer\RendererInterface;

class ContactModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS= __DIR__ . '/db/seeds';
    
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