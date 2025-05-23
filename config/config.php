<?php

use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use Framework\Router\RouterTwigExtension;
use Framework\Twig\{
    PagerFantaExtension, TextExtension, TimeExtension
};

return [
    'database.host' => 'localhost',
    'database.username' => 'root',
    'database.password' => '',
    'database.name' => 'blog',
    
    'views.path' => dirname(__DIR__) . '/views',
    
    'twig.extensions' => [
        \DI\get(RouterTwigExtension::class),
        \DI\get(PagerFantaExtension::class),
        \DI\get(TextExtension::class),
        \DI\get(TimeExtension::class)
    ],
    
    \Framework\Router::class => \DI\autowire(),
    
    RendererInterface::class => \DI\factory(TwigRendererFactory::class),
    
    \PDO::class => function (\Psr\Container\ContainerInterface $c) {
        return new PDO(
            'mysql:host=' . $c->get('database.host') . ';dbname=' . $c->get('database.name'),
            $c->get('database.username'),
            $c->get('database.password'),
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
];