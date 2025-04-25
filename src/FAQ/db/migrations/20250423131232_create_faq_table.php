<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
final class CreateFaqTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('faq')
            ->addColumn('slug','string')
            ->addColumn('question','string')
            ->addColumn('answer','text')
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('users_id', 'integer', ['null' => true])
            ->addForeignKey('users_id', 'users', 'id', [
                'delete' => 'CASCADE',
                'update' => 'NO_ACTION'
            ])
            ->create();

    }
}
