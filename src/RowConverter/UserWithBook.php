<?php

namespace Blackprism\NothingSample\RowConverter;

use Blackprism\Nothing\RowConverter;
use Doctrine\DBAL\Types\Type;

class UserWithBook
{
    public function __construct()
    {
        Type::addType('prefixed_string', PrefixStringType::class);
    }

    public function getRowConverter($connection)
    {
        $rowConvertor = new RowConverter($connection);
        $rowConvertor->registerType('book_name', 'prefixed_string');

        return $rowConvertor;
    }
}
