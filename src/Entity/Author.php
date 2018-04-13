<?php

namespace Blackprism\NothingSample\Entity;

class Author
{
    protected $id   = null;
    protected $name = null;

    public function __construct(int $id, string $name)
    {
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
}
