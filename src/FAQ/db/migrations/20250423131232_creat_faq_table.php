<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatFaqTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('faq')
            ->addColumn('question','string')
            ->addColumn('answer','string')
            ->addColumn('users_id', 'integer', ['null' => true])
            ->addForeignKey('users_id', 'users', 'id', ['delete'=> 'ON_CASCADE', 'update'=> 'NO_ACTION'])
            ->create();

    }
}
