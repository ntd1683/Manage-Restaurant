<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

abstract class AbstractEnum extends Enum
{
    protected static array $arrayView = [];

    public static function getArrayView(): array
    {
        return static::$arrayView;
    }

    public static function getArrayViewVN(): array
    {
        return static::$arrayView;
    }

    public static function getKeyByValue($value, $lang = 'en'): string
    {
        $arr = $lang === 'en' ? self::getArrayView() : self::getArrayViewVN();
        return array_search($value, $arr, true);
    }
}
