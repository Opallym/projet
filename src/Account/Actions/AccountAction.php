<?php

namespace App\Account\Actions;

use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class AccountAction
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
        return $this->renderer->render('@account/index');
    }

    public function show(string $slug): string
    {
        return $this->renderer->render('@account/show', [
            [
                'slug' => $slug
            ]
        ]);
    } 
}