<?php

namespace App\Maps\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class MapsAction
{
    public function __construct(
        private RendererInterface $renderer
    ){}

    public function __invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');

        if($slug){
            return $this->renderer->render('@maps/show',['slug' => $slug]);
        }
        return $this->index();
    }
    public function index(): string
    {
        return $this->renderer->render('@maps/index');
    }      
}