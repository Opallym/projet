<?php

namespace App\Home\Actions;

use App\Home\Table\PropertiesHomeTable;
use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeAction
{
    public function __construct(
        private RendererInterface $renderer,
        private PropertiesHomeTable $properties
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
        $properties = $this->properties->findPaginated();
        return $this->renderer->render('@home/index', compact('properties'));
    }

    public function show(string $slug)
    {
        /*return $this->renderer->render('@home/show', [
            [
                'slug' => $slug
            ]
        ]);*/
    }
    
}