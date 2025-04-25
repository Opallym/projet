<?php

use App\FAQ\FaqModule;
use App\FAQ\Actions\FaqAction;

use function DI\autowire;
use function DI\get;

return [
    'faq.prefix' => '/faq',
    FaqAction::class => autowire(),
    FaqModule::class => autowire()->constructorParameter('prefix', get('faq.prefix')),
];