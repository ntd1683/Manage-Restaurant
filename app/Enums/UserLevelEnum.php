<?php declare(strict_types=1);

namespace App\Enums;

final class UserLevelEnum extends AbstractEnum
{
    public const STAFF = 0;
    public const CASHIER = 1;
    public const CHEF = 2;
    public const MANAGER = 3;

    public static function getArrayView(): array
    {
        return [
            'Staff' => self::STAFF,
            'Cashier' => self::CASHIER,
            'Chef' => self::CHEF,
            'Manager' => self::MANAGER,
        ];
    }

    public static function getArrayViewVN(): array
    {
        return [
            'Nhân Viên' => self::STAFF,
            'Thu Ngân' => self::CASHIER,
            'Đầu Bếp' => self::CHEF,
            'Quản Lý' => self::MANAGER,
        ];
    }
}
