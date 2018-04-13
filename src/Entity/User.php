<?php

namespace Blackprism\NothingSample\Entity;

use RuntimeException;

class User
{
    protected $id    = null;
    protected $name  = null;
    protected $books = [];

    public function __construct(int $id, string $name)
    {
        if ($id < 0) {
            throw new RuntimeException("id must be positive");
        }

        $this->id   = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function giveBook(Book $book)
    {
        $book->userIs($this);
        $this->books[] = $book;
    }

    public function getBooks()
    {
        return $this->books;
    }
}
