<?php

namespace App\Blog\Table;

class BlogTable
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
     * 
     *
     * @return \stdClass[]
     */
    public function findPaginated(int $limit = 10): array
    {
        $statement = $this->pdo->query(
            'SELECT * FROM blog ORDER BY created_at DESC LIMIT ' . (int)$limit
        );
        return $statement->fetchAll() ?: [];
    }

    /**
     * 
     * @param string $slug
     * @return \stdClass
     */
    public function find(string $slug): \stdClass
    {
        $query = $this->pdo->prepare('SELECT * FROM blog WHERE slug = ?');
        $query->execute([$slug]);
        return $query->fetch() ?: null;
    }


    public function findBySlug(string $slug): ?\stdClass
{
    $query = $this->pdo->prepare('SELECT * FROM blog WHERE slug = ?');
    $query->execute([$slug]);
    return $query->fetch() ?: null;
}
}
