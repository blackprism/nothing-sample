<?php

namespace Blackprism\NothingSample;

use Blackprism\NothingSample\Hydrator\UserWithBook;
use Cache\Adapter\PHPArray\ArrayCachePool;
use Blackprism\NothingSample\RowConverter;
use Blackprism\Nothing\Hydrator;

$connection = require __DIR__ . '/common.php';

$cachePool = new ArrayCachePool();
$repository = new Repository($connection, $cachePool, new Hydrator(), new RowConverter\UserWithBook(), new UserWithBook());

$repository->getUsersWithBookAndCache();
$collection = $repository->getUsersWithBookAndCache();

foreach ($collection as $id => $name) {
    var_dump($id, $name);
}
