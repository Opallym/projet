<?php

namespace App\Home\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeAction
{
    public function __construct(
        private RendererInterface $renderer
    ){}

    public function __invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');

        if($slug){
            return $this->show($slug);
        }
        return $this->index();
    }
    public function index(): string
    {
        return $this->renderer->render('@home/index');
    }

    public function show(string $slug): string
    {
        return $this->renderer->render('@home/show', [
            [
                'slug' => $slug
            ]
        ]);
    }
    
}