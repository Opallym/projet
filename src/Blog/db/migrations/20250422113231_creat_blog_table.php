<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatBlogTable extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('blog')
            ->addColumn('title','string')
            ->addColumn('slug','string')
            ->addColumn('content','text',[
                'limit'=>\phinx\Db\Adapter\MysqlAdapter::TEXT_LONG    
            ])
            ->addColumn('photo','string')
            ->addColumn('updated_at','datetime')
            ->addColumn('created_at','datetime')
            ->create();

    }
}
