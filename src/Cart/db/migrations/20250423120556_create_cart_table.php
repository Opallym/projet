<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCartTable extends AbstractMigration
{
    public function change(): void
    {
        $this->table('Cart')
            ->addColumn('slug','string')
            ->addColumn('Reference','string')
            ->addColumn('PriceTTC','decimal')
            ->addColumn('priceHT','decimal')
            ->addColumn('EntryDate','datetime')
            ->addColumn('ReleaseDate','datetime')
            ->create();
    }
}
