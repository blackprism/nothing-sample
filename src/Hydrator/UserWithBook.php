<?php

namespace Blackprism\NothingSample\Hydrator;

use Blackprism\NothingSample\Entity\Author;
use Blackprism\NothingSample\Entity\Book;
use Blackprism\NothingSample\Entity\User;

class UserWithBook
{
    /**
     * @param iterable $rows
     *
     * @return \ArrayObject
     */
    public function map(iterable $rows): \ArrayObject
    {
        $collection = new \ArrayObject();
        foreach ($rows as $row) {
            $this->mapRow($row, $collection);
        }

        return $collection;
    }

    private function mapRow(iterable $row, \ArrayObject $collection)
    {
        $book = new Book(
            $row['book_id'],
            $row['book_name'],
            new Author($row['author_id'], $row['author_name'])
        );

        if (isset($data[$row['user_id']]) === false) {
            $collection[$row['user_id']] = new User($row['user_id'], $row['user_name']);
        }

        $collection[$row['user_id']]->giveBook($book);
    }
}
