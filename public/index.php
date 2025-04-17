<?php
require '../vendor/autoload.php';

$renderer = new \Framework\Renderer\TwigRenderer(dirname(__DIR__) . '/views');

$app = new \Framework\App([
    \App\Blog\BlogModule::class,
    \App\Home\HomeModule::class,
    \App\Contact\ContactModule::class,
    \App\Cart\CartModule::class,
    \App\Faq\FaqModule::class,
    \App\Checkout\CheckoutModule::class,
    \App\Maps\MapsModule::class

    // properties
    // F.A.Q
],[
    'renderer'=>$renderer
]);
$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
\Http\Response\Send($response);