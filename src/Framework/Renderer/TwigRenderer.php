<?php

namespace Framework\Renderer;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Framework\Renderer\RendererInterface;

class TwigRenderer implements RendererInterface
{
    private $twig;
    private $loader;

    public function __construct(\Twig\Loader\FilesystemLoader $loader, Environment $twig )
    {
        $this->loader = $loader;
        $this->twig = $twig;
    }

    public function addPath(string $namespace, ?string $path = null): void
    {
        $this->loader->addPath($path, $namespace);
    }

    public function render(string $view, array $params = []): string
    {
        return $this->twig->render($view . '.twig', $params);
    }

    public function addGlobal(string $key, $value): void
    {
        $this->twig->addGlobal($key, $value);
    }
}
