<?php 
 
 
namespace App\Enums;

// الحالة الفنية للمسجد

enum MosqueConditionEnum: string
{
    case POOR = 'ضعيفة';
    case FAIR = 'متوسطة';
    case GOOD = 'جيدة';
    case EXCELLENT = 'ممتازة';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}