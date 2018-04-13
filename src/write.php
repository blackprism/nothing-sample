<?php

use Blackprism\NothingSample;

use Blackprism\NothingSample\Entity\Author;
use Doctrine\DBAL\Connection;

$conn = require __DIR__ . '/common.php';

function persist(Connection $conn, Author $author)
{
    $queryBuilder = $conn->createQueryBuilder();
    $queryBuilder
        ->insert('author')
        ->values([
            'id'   => ':id',
            'name' => ':name'
        ])
        ->setParameters([
            'id'   => $author->getId(),
            'name' => $author->getName()
        ]);

    $queryBuilder->execute();
}

$author = new Author(5, 'Tartempion');

persist($conn, $author);
