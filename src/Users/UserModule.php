<?php

namespace App\Users;

class UserModule
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS= __DIR__ . '/db/seeds';
    
    public function __construct()
    {
        echo 'User';
    }
}
