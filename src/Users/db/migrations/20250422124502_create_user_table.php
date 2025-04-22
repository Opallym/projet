<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUserTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('users')
            ->addColumn('firstname','string')
            ->addColumn('lastname','string')
            ->addColumn('password','string')
            ->addColumn('email','string')
            ->addColumn('role','string')
            ->addColumn('is_valid','boolean')
            ->addColumn('updated_at','datetime')
            ->addColumn('register_at','datetime')
            ->addColumn('phone_number','string')
            ->create();

    }
}
