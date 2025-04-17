<?php

namespace Tests\Mario;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class MarioTest extends TestCase
{
    public function testUri()
    {
        $app = new App();
        $request = new ServerRequest('GET', '/Home');

        $response = $app->run($request);
        $this->assertContains('/Home', $response->getHeader('Location'));
        $this->assertEquals(301, $response->getStatusCode());

        // comment verifier un contrainte avec uri tableau
    }
}
