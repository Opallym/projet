<?php
namespace Tests\Beny;

use Framework\App;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\ServerRequest;


class BenyTest extends TestCase
{
    /**Test pour vérifier si la route "/blog" retourne la bonne réponse. */
    public function testVente(){
        /**Création d'une instance de l'application */
        $app = new App();
        /**Création d'une requête HTTP GET vers l'URL '/vente */
        $request = new ServerRequest('GET','/vente');
        /**Exécution de la requête via l'application pour obtenir la réponse. */
        $response = $app->run($request);
        /**Vérification que le corps de la réponse contient le texte HTML attendu pour la page du blog. */
        $this->assertStringContainsString('<h1>Cath. vente</h1>', (string)$response->getBody());
        /** Vérification que le code de statut HTTP est 200, ce qui indique une réponse réussie.*/
        $this->assertEquals(200, $response->getStatusCode());
        
    } 
    /**Test pour vérifier si l'application redirige correctement les URL avec un slash final.  */
    public function testRedirectTraillingSlash(){
       /**Création d'une instance de l'application*/
        $app = new App();
        /**Création d'une requête HTTP GET vers l'URL '/demoslash/' (avec un slash final).  */
        $request = new ServerRequest('GET','/vente/');
        /**Exécution de la requête via l'application pour obtenir la réponse. */
        $response = $app->run($request);
        /**Vérification que l'en-tête 'Location' dans la réponse contient l'URL sans le slash final.
        Cela valide que l'application redirige correctement l'URL. */
        $this->assertContains('/vente', $response->getHeader('Location'));
       /**Vérification que le code de statut HTTP est 301, ce qui indique une redirection permanente. */
        $this->assertEquals(301, $response->getStatusCode());
        
    }
     /**Test pour vérifier si la route non définie renvoie une erreur 404. */
     public function testError404(){
        /**Création d'une instance de l'application */
        $app = new App();
        /**Création d'une requête HTTP GET vers une URL inexistante '/vtr'. */
        $request = new ServerRequest('GET','/vtr');
        /**Exécution de la requête via l'application pour obtenir la réponse. */
        $response = $app->run($request);   
        /**Vérification que le corps de la réponse contient le texte HTML attendu pour une erreur 404. */
        $this->assertStringContainsString('<h1>Cath. vente</h1>', (string)$response->getBody());
        /**Vérification que le code de statut HTTP est 404, ce qui indique que la page n'a pas été trouvée. */     
        $this->assertEquals(404, $response->getStatusCode());
     }
}
