<?php

use function DI\autowire;

use Framework\Renderer\RendererInterface;
use Framework\Router\RouterTwigExtension;
use Framework\Renderer\TwigRendererFactory;


return [
    'views.path' => dirname(__DIR__) . '/views',
    'twig.extension' => [
        \DI\get(RouterTwigExtension::class)
    ],

    \Framework\Router::class => autowire(),

    RendererInterface::class => \DI\factory(TwigRendererFactory::class)
];

