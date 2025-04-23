<?php

use App\Account\AccountModule;

use function DI\autowire;
use function DI\get;

return [
    'account.prefix' => '/account',
    AccountModule::class => autowire()->constructorParameter('prefix', get('account.prefix')),
];