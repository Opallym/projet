<?php
namespace Tests\Maelle;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class MaelleTest extends TestCase
{
    public function testMonCompte()
    {
        $app = new App();
        $request = new ServerRequest('GET', '/mon-compte');
        $response = $app->run($request);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('<h1>Mon compte</h1>',(string)$response->getBody());
    }
    
}