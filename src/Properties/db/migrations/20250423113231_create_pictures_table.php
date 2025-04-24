<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePicturesTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('pictures')
            ->addColumn('name','string')
            ->addColumn('position','integer')
            ->addForeignKey('property_id', 'properties', 'id')
            ->create();

    }
}
