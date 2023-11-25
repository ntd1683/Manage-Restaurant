<?php declare(strict_types=1);

namespace App\Enums;

final class CategoryQuantityProductEnum extends AbstractEnum
{
    public const PLATE = 0;
    public const GLASS = 1;
    public const POT = 2;
    public const COMBO = 3;

    public static function getArrayView(): array
    {
        return [
            'Plate' => self::PLATE,
            'Glass' => self::GLASS,
            'Pot' => self::POT,
            'Combo' => self::COMBO,
        ];
    }

    public static function getArrayViewVN(): array
    {
        return [
            'Dĩa' => self::PLATE,
            'Ly' => self::GLASS,
            'Nồi' => self::POT,
            'Combo' => self::COMBO,
        ];
    }
}
