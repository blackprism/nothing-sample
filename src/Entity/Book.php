<?php

namespace Blackprism\NothingSample\Entity;

class Book
{
    protected $id       = null;
    protected $name     = null;
    protected $author   = null;
    protected $user     = null;

    public function __construct(int $id, string $name, Author $author)
    {
        $this->id     = $id;
        $this->name   = $name;
        $this->author = $author;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function userIs(User $user)
    {
        $this->user = $user;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }
}
