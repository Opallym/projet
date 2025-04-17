<?php

namespace App\Blog;

use Framework\Router;
use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogModule
{
    public function __construct(
        private Router $router,
        private RendererInterface $renderer
    ) {
        $this->renderer->addPath('blog', __DIR__ . '/views');

        $router->get('/blog', [$this, 'index'], 'blog.index');
        $router->get('/blog/{slug}', [$this, 'show'], 'blog.show');
    }

    public function index(): string
    {
        return $this->renderer->render('@blog/index');
    }

    public function show(Request $request): string
    {
        return $this->renderer->render('@blog/show', [
            [
                'slug' => $request->getAttribute('slug')
            ]
        ]);
    }
}
