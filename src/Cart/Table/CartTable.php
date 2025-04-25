<?php

namespace App\Cart\Table;

class CartTable
{

    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }



    /**
     * Récupère un article à partir de son ID
     * @param int $id
     * @return \stdClass
     */
    public function find(int $id): ?\stdClass
    {
        $query = $this->pdo
            ->prepare('SELECT * FROM cart WHERE id = ?');
        $query->execute([$id]);
        
        $result = $query->fetch(\PDO::FETCH_OBJ);
        
            if ($result === false) {
                return null;
            }
        return $query->fetch();
    }
}
