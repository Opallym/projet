<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePropertiesTable extends AbstractMigration
{

    public function change(): void
    {
        $this->table('properties', ['id' => false, 'primary_key' => 'id'])
            ->addColumn('id', 'integer', ['identity' => true])
            ->addColumn('user_id', 'integer')
            ->addColumn('title', 'string')
            ->addColumn('description', 'text')
            ->addColumn('type', 'enum', ['values' => ['house', 'apartment', 'villa']])
            ->addColumn('price', 'decimal', ['precision' => 12, 'scale' => 2])
            ->addColumn('surface', 'decimal', ['precision' => 8, 'scale' => 2])
            ->addColumn('chamber', 'integer')
            ->addColumn('bathroom', 'integer')
            ->addColumn('address', 'string')
            ->addColumn('postal_code', 'string')
            ->addColumn('city', 'string')
            ->addColumn('country', 'string')
            ->addColumn('latitude', 'float')
            ->addColumn('longitude', 'float')
            ->addColumn('garden', 'boolean')
            ->addColumn('balcon', 'boolean')
            ->addColumn('elevator', 'boolean')
            ->addColumn('view', 'enum', ['values' => ['sea', 'mountain', 'city', 'garden']])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->addForeignKey('user_id', 'users', 'id')

            ->create();
    }
}
