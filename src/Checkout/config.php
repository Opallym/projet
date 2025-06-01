<?php

use App\Checkout\CheckoutModule;

use function DI\autowire;
use function DI\get;

return [
    'checkout.prefix' => '/checkout',
    CheckoutModule::class => autowire()->constructorParameter('prefix', get('checkout.prefix')),
];
<?php
return [];
