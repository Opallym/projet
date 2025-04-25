<?php

namespace App\Properties\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class PropertiesAction
{
    public function __construct(
        private RendererInterface $renderer
    ){}

    public function __invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');

        if($slug){
            return $this->renderer->render('@properties/show',['slug' => $slug]);
        }
        return $this->index();
    }
    public function index(): string
    {
        return $this->renderer->render('@properties/index');
    }     
}