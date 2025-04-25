<?php

use App\Cart\CartModule;

use function DI\autowire;
use function DI\get;

return [
    'cart.prefix' => '/cart',
    CartModule::class => autowire()->constructorParameter('prefix', get('cart.prefix')),
];