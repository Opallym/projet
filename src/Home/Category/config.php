<?php

use App\Home\Category\CategoryModule;

use function DI\autowire;
use function DI\get;

return [
    'category.prefix' => '/category',
    CategoryModule::class => autowire()->constructorParameter('prefix', get('category.prefix')),
];