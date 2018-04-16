<?php

namespace Blackprism\NothingSample\Hydrator;

use Blackprism\Nothing\Hydrator\Mapper;
use Blackprism\NothingSample\Entity\Author;
use Blackprism\NothingSample\Entity\Book;
use Blackprism\NothingSample\Entity\User;

class UserWithBook implements Mapper
{
    /**
     * @param array $row
     * @param mixed $data
     *
     * @return mixed
     */
    public function map(array $row, $data)
    {
        $book = new Book(
            $row['book_id'],
            $row['book_name'],
            new Author($row['author_id'], $row['author_name'])
        );

        if (isset($data[$row['user_id']]) === false) {
            $data[$row['user_id']] = new User($row['user_id'], $row['user_name']);
        }

        $data[$row['user_id']]->giveBook($book);

        return $data;
    }
}
