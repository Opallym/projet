<?php

namespace App\FAQ;

use Framework\Module;
use Framework\Router;
use Framework\Renderer\RendererInterface;
use App\FAQ\Actions\FaqAction;

class FaqModule extends Module
{   
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS = __DIR__ . '/db/seeds';

    public function __construct(Router $router, RendererInterface $renderer)
    {
        $renderer->addPath('faq', __DIR__ . '/views');

        $router->get('/faq', FaqAction::class, 'faq.index');
        $router->get('/faq/{slug:[a-z0-9\-]+}', FaqAction::class, 'faq.show');
    }
}