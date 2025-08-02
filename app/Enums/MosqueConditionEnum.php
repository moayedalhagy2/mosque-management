<?php


namespace App\Enums;

// الحالة الفنية للمسجد

enum MosqueConditionEnum: string
{
    case EXCELLENT = 'ممتازة';
    case GOOD = 'جيدة';
    case FAIR = 'متوسطة';
    case POOR = 'ضعيفة';
    case VERY_POOR = 'ضعيفة جدا';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
