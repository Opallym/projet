<?php

namespace App\Account;

use App\Account\Actions\AccountAction;
use Framework\Module;
use Framework\Router;
use Framework\Renderer\RendererInterface;

class AccountModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS= __DIR__ . '/db/seeds';

    public function __construct( string $prefix, Router $router, RendererInterface $renderer) 
    {
        $renderer->addPath('account', __DIR__ . '/views');

        $router->get($prefix , AccountAction::class, 'account.index');
        $router->get($prefix . '/{slug:[a-z\-0-9]+}', AccountAction::class, 'account.show');
    }  
}
