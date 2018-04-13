<?php

namespace Blackprism\NothingSample\RowConverter;

use Blackprism\Nothing\RowConverter\FieldConverter;

class FieldInt implements FieldConverter
{
    public function convertFromDatabase($value)
    {
        return (int) $value;
    }

    public function convertToDatabase($value)
    {
        return (int) $value;
    }
}
