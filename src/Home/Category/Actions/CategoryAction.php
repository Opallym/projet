<?php

namespace App\Home\Category\Actions;

use Framework\Module;
use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class CategoryAction extends Module
{
    public function __construct(
        private RendererInterface $renderer
    ){}

    public function invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');

        if($slug){
            return $this->show($slug);
        }
        return $this->index();
    }
    public function index(): string
    {
        return $this->renderer->render('@category/index');
    }

    public function show(string $slug): string
    {
        return $this->renderer->render('@category/show', [
            [
                'slug' => $slug
            ]
        ]);
    }

}