<?php

namespace Esteban;

use Framework\App;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class EstebanTest extends TestCase
{
    public function testBlogRouteReturns200()
    {

        $app = new App();
        $request = new ServerRequest('GET', '/vente/maison/8');
        $response = $app->run($request);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUnknownRouteReturns404()
    {
        $app = new App();
        $request = new ServerRequest('GET', '/unknow-route');
        $response = $app->run($request);
        $this->assertEquals(404, $response->getStatusCode());
    }
}
