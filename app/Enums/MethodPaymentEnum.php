<?php declare(strict_types=1);

namespace App\Enums;

final class MethodPaymentEnum extends AbstractEnum
{
    public const CASH = 0;
    public const BANK = 1;
    public const MOMO = 2;
    public const VNPAY = 3;

    public static function getArrayView(): array
    {
        return [
            'Cash' => self::CASH,
            'Bank' => self::BANK,
            'Momo' => self::MOMO,
            'Vnpay' => self::VNPAY,
        ];
    }

    public static function getArrayViewVN(): array
    {
        return [
            'Tiền Mặt' => self::CASH,
            'Ngân Hàng' => self::BANK,
            'Momo' => self::MOMO,
            'Vnpay' => self::VNPAY,
        ];
    }
}
