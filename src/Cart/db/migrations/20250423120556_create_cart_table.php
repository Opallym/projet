<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCartTable extends AbstractMigration
{
    public function change(): void
    {

        // Création de la table Cart ensuite
        $cartTable = $this->table('Cart');
        $cartTable->addColumn('slug', 'string')
                  ->addColumn('Reference', 'string')
                  ->addColumn('Pricettc', 'decimal')
                  ->addColumn('priceht', 'decimal')
                  ->addColumn('entryDate', 'datetime')
                  ->addColumn('releaseDate', 'datetime')
                  ->create();
    }
}
