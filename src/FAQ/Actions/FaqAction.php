<?php

namespace App\FAQ\Actions;

use App\FAQ\Table\FaqTable;
use Framework\Renderer\RendererInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class FaqAction
{
    private RendererInterface $renderer;
    private FaqTable $faqTable;

    public function __construct(RendererInterface $renderer, FaqTable $faqTable)
    {
        $this->renderer = $renderer;
        $this->faqTable = $faqTable;
    }

    public function __invoke(Request $request): string
    {
        $slug = $request->getAttribute('slug');

        if ($slug) {
            return $this->show($slug);
        }

        return $this->index();
    }

    public function index(): string
    {
        $faqs = $this->faqTable->findPaginated();

        return $this->renderer->render('@faq/index', [
            'faqs' => $faqs
        ]);
    }

    public function show(string $slug): string
{
    $faq = $this->faqTable->findBySlug($slug);

    if (!$faq) {
        header('Location: /faq');
        exit;
    }

    return $this->renderer->render('@faq/show', [
        'faq' => $faq
    ]);
}

}

