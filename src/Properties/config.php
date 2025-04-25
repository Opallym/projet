<?php

use App\Properties\PropertiesModule;

use function DI\autowire;
use function DI\get;

return [
    'properties.prefix' => '/properties',
    PropertiesModule::class => autowire()->constructorParameter('prefix', get('properties.prefix')),
];