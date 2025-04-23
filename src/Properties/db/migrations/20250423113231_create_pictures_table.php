<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatPicturesTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('pictures')
            ->addColumn('name','string')
            ->addColumn('position','integer')
            ->addColumn('properties_id', 'integer', ['null' => true])
            ->addForeignKey('properties_id', 'properties', 'id', ['delete'=> 'ON_CASCADE', 'update'=> 'NO_ACTION'])
            ->create();

    }
}
