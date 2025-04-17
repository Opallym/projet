<?php

namespace Tests\Gwendoline;

use Framework\App;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\ServerRequest;

class GwendolineTest extends TestCase
{
    private $app;

    // This method is run before each test to set up the application instance
    protected function setUp(): void
    {
        $this->app = new App();
    }

    // Test to verify that accessing '/blog/' triggers a 301 redirect to '/blog'
    public function testBlogServer()
    {
        $request = new ServerRequest('GET', '/blog/');
        $response = $this->app->run($request);

        // Check if the status code is 301 (Moved Permanently)
        $this->assertEquals(301, $response->getStatusCode());

        // Check if the Location header contains '/blog'
        $this->assertContains('/blog', $response->getHeader('Location'));
    }

    // Test to verify the correct rendering and status code for '/blog'
    public function testBlogSlug()
    {
        $request = new ServerRequest('GET', '/blog');
        $response = $this->app->run($request);

        // Check if the response body contains the blog header
        $this->assertStringContainsString('<h1>Blog</h1>', (string)$response->getBody());

        // Check if the status code is 200 (OK)
        $this->assertEquals(200, $response->getStatusCode());
    }

    // Test to ensure a 404 error is returned for a non-existent route
    public function testBlogError()
    {
        $request = new ServerRequest('GET', '/azerty');
        $response = $this->app->run($request);

        // Check if the response body contains 'Erreur 404'
        $this->assertStringContainsString(
            'Erreur 404',
            (string)$response->getBody()
        );

        // Check if the status code is 404 (Not Found)
        $this->assertEquals(404, $response->getStatusCode());
    }
}
