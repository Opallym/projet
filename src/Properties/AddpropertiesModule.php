<?php

namespace App\Properties;

use Framework\Module;

class AddpropertiesModule extends Module
{   
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS= __DIR__ . '/db/seeds';
    public function __construct()
    {
        echo 'Add New Listing';
    }
}
