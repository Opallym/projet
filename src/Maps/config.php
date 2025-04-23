<?php

use App\Maps\MapsModule;

use function DI\autowire;
use function DI\get;

return [
    'maps.prefix' => '/maps',
    MapsModule::class => autowire()->constructorParameter('prefix', get('maps.prefix')),
];