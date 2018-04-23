<?php

namespace Blackprism\NothingSample;

use Blackprism\NothingSample\Hydrator\UserWithBook;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\SimpleCache\CacheInterface;

class Repository
{
    private $connection;
    private $cachePool;
    private $userWithBookMapper;

    public function __construct(Connection $connection, CacheInterface $cachePool, UserWithBook $userWithBookMapper)
    {
        $this->connection         = $connection;
        $this->cachePool          = $cachePool;
        $this->userWithBookMapper = $userWithBookMapper;
    }

    public function getUsersWithBook()
    {
        $rows = $this->getUsersWithBookRows();
        return $this->hydrateUsersWithBook($rows);
    }

    private function getUsersWithBookRows()
    {
        /** @var QueryBuilder $queryBuilder */
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select(
                'user.id as user_id',
                'user.name as user_name',
                'book.id as book_id',
                'book.name as book_name',
                'author.id as author_id',
                'author.name as author_name'
            )
            ->from('user')
            ->innerJoin('user', 'book', 'book', 'book.user_id = user.id')
            ->innerJoin('book', 'author', 'author', 'author.id = book.author_id')
            ->orderBy('user.id');

        return $queryBuilder->execute();
    }

    /**
     * @param iterable $rows
     *
     * @throws \Doctrine\DBAL\DBALException
     *
     * @return iterable
     */
    private function hydrateUsersWithBook(iterable $rows)
    {
        return $this->userWithBookMapper->map($rows);
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *
     * @return iterable
     */
    public function getUsersWithBookAndCache()
    {
        if ($this->cachePool->has('user_with_book') === false) {
            $rows = $this->getUsersWithBookRows();
            $this->cachePool->set('user_with_book', iterator_to_array($rows));

            $rows = $this->hydrateUsersWithBook($rows);

            return $rows;
        }

        $rows = $this->cachePool->get('user_with_book');
        return $this->hydrateUsersWithBook($rows);
    }
}
