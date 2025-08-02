<?php

namespace App\Enums;

// مهدم كليا او جزئيا
enum MosqueDestructionStatusEnum: string
{
    case NONE = 'لا يوجد';
    case FULLY_DEMOLISHED = 'مهدم كلياً';
    case PARTIALLY_DEMOLISHED = 'مهدم جزئياً';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
