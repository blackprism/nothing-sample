<?php

namespace Blackprism\NothingSample\RowConverter;

use Blackprism\Nothing\RowConverter;

class UserWithBook
{
    public function getRowConverter()
    {
        $typeInt = new FieldInt();
        $typeString = new FieldString();

        $rowConvertor = new RowConverter();
        $rowConvertor->registerField('book_id', $typeInt);
        $rowConvertor->registerField('user_id', $typeInt);
        $rowConvertor->registerField('author_id', $typeInt);
        $rowConvertor->registerField('book_name', $typeString);
        $rowConvertor->registerField('user_name', $typeString);

        return $rowConvertor;
    }
}
