<?php


require '../vendor/autoload.php';

use Framework\App;


// s à la fin pcq c'est un tableau
$modules = [
    \App\Blog\BlogModule::class,
    \App\Home\HomeModule::class,
    /*\App\Contact\ContactModule::class, 
    \App\Cart\CartModule::class,
    \App\Faq\FaqModule::class,
    \App\Checkout\CheckoutModule::class,
    \App\Maps\MapsModule::class */
];

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions(dirname(__DIR__) . '/config/config.php');
//$builder->addDefinitions(dirname(__DIR__) . '/config.php');


foreach($modules as $module){
    if($module::DEFINITIONS){
        $builder->addDefinitions($module::DEFINITIONS);
    }
}

$container = $builder->build();

$app = new \Framework\App($container, $modules);  // est égal au use 
$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());
\Http\Response\send($response);