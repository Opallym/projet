<?php
namespace App\FAQ\Table;

class FaqTable
{
    public function __construct(
        private \PDO $pdo
    ) {}

    public function findPaginated(): array
    {
        return $this->pdo
            ->query('SELECT * FROM faq ORDER BY created_at DESC LIMIT 10')
            ->fetchAll();
    }

    public function findBySlug(string $slug): \stdClass|false
    {
        $query = $this->pdo->prepare('SELECT * FROM faq WHERE slug = ?');
        $query->execute([$slug]);
        return $query->fetch();
    }
}
