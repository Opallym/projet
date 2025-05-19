<?php
namespace App\Blog\Actions;

use App\Blog\Table\PostTable;
use Framework\Actions\RouterAwareAction;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as Request;

class BlogAction
{
    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var PostTable
     */
    private $postTable;
    use RouterAwareAction;

    /**
     * @param RendererInterface $renderer Instance du moteur de rendu.
     * @param Router $router Instance du routeur.
     * @param PostTable $postTable Instance pour accéder aux données des articles.
     */
    public function __construct(RendererInterface $renderer, Router $router, PostTable $postTable)
    {
        $this->renderer = $renderer;
        $this->router = $router;
        $this->postTable = $postTable;
    }

    /**
     * @param Request $request Requête HTTP.
     * @return ResponseInterface|string
     */
    public function __invoke(Request $request)
    {
        if ($request->getAttribute('id')) {
            return $this->show($request);
        }
        return $this->index($request);
    }

    /**
     * @param Request $request Requête HTTP.
     * @return string Contenu HTML de la page des articles.
     */
    public function index(Request $request): string
    {
        $params = $request->getQueryParams();

        $posts = $this->postTable->findPaginated(12, $params['p'] ?? 1);

        return $this->renderer->render('@blog/index', compact('posts'));
    }

    /**
     * @param Request $request Requête HTTP.
     * @return ResponseInterface|string Contenu HTML ou redirection.
     */
    public function show(Request $request)
    {
        $slug = $request->getAttribute('slug');
        $post = $this->postTable->find($request->getAttribute('id'));

        if ($post->slug !== $slug) {
            return $this->redirect('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id
            ]);
        }

        return $this->renderer->render('@blog/show', [
            'post' => $post
        ]);
    }
}