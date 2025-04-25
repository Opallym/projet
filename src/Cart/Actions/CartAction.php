<?php

namespace App\Cart;


use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class CartAction
{
    public function __construct(
        private RendererInterface $renderer
    ){}

    public function invoke(Request $request)
    {
        $slug = $request->getAttribute('slug');

        return $this->index();
    }
    public function index(): string
    {
        return $this->renderer->render('@cart/index');
    }

}