<?php

namespace Blackprism\NothingSample\RowConverter;

use Blackprism\Nothing\RowConverter;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class UserWithBook
{
    public function __construct()
    {
        Type::addType('prefixed_string', PrefixStringType::class);
    }

    public function getRowConverter(AbstractPlatform $connection): RowConverter
    {
        $rowConverter = new RowConverter($connection);
        $rowConverter->registerType('book_name', 'prefixed_string');

        return $rowConverter;
    }
}
