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

    public function getId()
    {
        return (int) $this->id;
    }

    public function userIs(User $user)
    {
        $this->user = $user;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getAuthor()
    {
        return $this->author;
    }
}
