<?php

namespace App\Blog\Actions;

use App\Blog\Table\BlogTable;
use Framework\Actions\RouterAwareAction;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogAction
{
    use RouterAwareAction;

    public function __construct(
        private RendererInterface $renderer,
        private Router $router,
        private BlogTable $blogTable
    ) {
    }

    public function __invoke(Request $request): string|ResponseInterface
    {
        $slug = $request->getAttribute('slug');
        return $slug ? $this->show($slug) : $this->index();
    }

    public function index(): string
    {        $blogs = $this->blogTable->findPaginated();

        return $this->renderer->render('@blog/index', compact('blogs'));
    }

    public function show(string $slug): string|ResponseInterface
    {
        $blog = $this->blogTable->findBySlug($slug);

        if (!$blog) {
            return $this->renderer->render('@blog/404');
        }

        return $this->renderer->render('@blog/show', ['blog' => $blog]);
    }
}