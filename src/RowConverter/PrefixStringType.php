<?php

namespace Blackprism\NothingSample\RowConverter;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class PrefixStringType extends StringType
{
    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return 'prefixed ' . $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'prefixed_string';
    }
}
