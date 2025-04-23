<?php

use App\Users\UserModule;

use function DI\autowire;
use function DI\get;

return [
    'user.prefix' => '/',
    UserModule::class => autowire()->constructorParameter('prefix', get('user.prefix')),
];