<?php

namespace App\Home\Table;

class PropertiesHomeTable
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
     * Pagine les articles
     *
     * @return \stdClass[]
     */
    public function findPaginated(): array
    {
        return $this->pdo
            ->query('SELECT properties.*, pictures.* FROM properties INNER JOIN pictures ON properties.id = pictures.properties_id ORDER BY properties.id DESC LIMIT 6')
            ->fetchAll();
    }

    /**
     * Récupère un article à partir de son ID
     * @param int $id
     * @return \stdClass
     */
    public function find(int $id): \stdClass
    {
        $query = $this->pdo
            ->prepare('SELECT * FROM properties WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch();
    }
}
