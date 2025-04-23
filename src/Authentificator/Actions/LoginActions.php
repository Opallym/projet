<?php

namespace App\Authentificator\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginActions
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
        return $this->renderer->render('@loginindex/index');
    }

    public function show(string $slug): string
    {
        return $this->renderer->render('@loginshow/show', [
            [
                'slug' => $slug
            ]
        ]);
    }
    
}