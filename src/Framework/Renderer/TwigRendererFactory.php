<?php

namespace Framework\Renderer;

use Twig\Loader\FilesystemLoader;
use Psr\Container\ContainerInterface;

class TwigRendererFactory 
{
    public function __invoke(ContainerInterface $container)
    {
        $viewpath = $container->get('views.path');
        $loader = new FilesystemLoader($viewpath);
        $twig = new \Twig\Environment($loader);

        if($container->has('twig.extension')) 
        {
            foreach($container->get('twig.extension') as $extension){
                $twig->addExtension($extension);
            }
        }

        return new TwigRenderer($loader, $twig);
    }
}