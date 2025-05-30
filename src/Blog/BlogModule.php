<?php
namespace App\Blog;

// Importation des classes nécessaires pour configurer le module Blog.
use App\Blog\Actions\BlogAction;
use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Router;

class BlogModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS =  __DIR__ . '/db/migrations';
    const SEEDS =  __DIR__ . '/db/seeds';

    /**
     * @param string $prefix
     * @param Router $router 
     * @param RendererInterface $renderer 
     */
    public function __construct(string $prefix, Router $router, RendererInterface $renderer)
    {
        $renderer->addPath('blog', __DIR__ . '/views');
        $router->get($prefix, BlogAction::class, 'blog.index');
        $router->get($prefix . '/{slug:[a-z\-0-9]+}-{id:[0-9]+}', BlogAction::class, 'blog.show');
    }
}