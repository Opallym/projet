<?php
namespace App\Blog\Entity;

class Post
{
    public $id;
    public $name;
    public $slug;
    public $content;
    public $created_at;
    public $updated_at;

    /**
     * Transforme les champs created_at et updated_at en objets DateTime
     */
    public function hydrateDates(): void
    {
        if (!empty($this->created_at) && is_string($this->created_at)) {
            $this->created_at = new \DateTime($this->created_at);
        }
        if (!empty($this->updated_at) && is_string($this->updated_at)) {
            $this->updated_at = new \DateTime($this->updated_at);
        }
    }
}
