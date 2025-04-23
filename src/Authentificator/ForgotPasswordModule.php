<?php

namespace App\Authentificator;

use Framework\Module;

class ForgotPasswordModule extends Module
{
    const DEFINITIONS = __DIR__ . '/config.php';
    const MIGRATIONS = __DIR__ . '/db/migrations';
    const SEEDS= __DIR__ . '/db/seeds';
    public function __construct()
    {
        echo 'Forgot password';
    }
}
