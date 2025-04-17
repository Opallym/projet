<?php

namespace Tests\Sara;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class SaraTest extends TestCase
{
    public function testUri()
    {
        $app = new App();
        $request = new ServerRequest('GET', '/faq/');
        $response = $app->run($request);

        $this->assertEquals(301, $response->getStatusCode());
        $this->assertContains('/faq', $response->getHeader('Location'));
    }
    public function testResponse()
    {
        $app = new App();
        $request = new ServerRequest('GET', '/faq');
        $response = $app->run($request);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('<h1>F.A.Q</h1>', (string)$response->getBody());
    }
    public function TestPageInconnue()
    {
        $app = new App();
        $request = new ServerRequest('GET', '/page-inconnue');
        $response = $app->run($request);

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertStringContainsString('<h1>404 - Page non trouvée</h1>', (string)$response->getBody());
    }
}
