<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCategoryTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('category')
            ->addColumn('name','string')
            ->addColumn('langue','string')
            ->addColumn('slug','string')
            ->addColumn('picture','string')
            ->addColumn('is_online','boolean')
            ->addColumn('parent','integer')

            ->create();

    }
}
