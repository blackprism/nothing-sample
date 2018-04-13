<?php

namespace Blackprism\NothingSample\RowConverter;

use Blackprism\Nothing\RowConverter\FieldConverter;

class FieldString implements FieldConverter
{
    public function convertFromDatabase($value)
    {
        return (string) $value;
    }

    public function convertToDatabase($value)
    {
        return (string) $value;
    }
}
