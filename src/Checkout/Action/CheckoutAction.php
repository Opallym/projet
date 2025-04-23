<?php

namespace App\Checkout\Action;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class CheckoutAction
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
        return $this->renderer->render('@checkout/index');
    }

    public function show(string $slug): string
    {
        return $this->renderer->render('@checkout/show', [
            [
                'slug' => $slug
            ]
        ]);
    }
    
}