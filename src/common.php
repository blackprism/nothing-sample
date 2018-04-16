<?php

namespace Blackprism\NothingSample;

use Doctrine\DBAL\DriverManager;

require __DIR__ . '/../vendor/autoload.php';

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = [
    'url' => 'sqlite:///' . realpath(__DIR__ . '/../database/library.db')
];

$conn = DriverManager::getConnection($connectionParams, $config);

return $conn;
