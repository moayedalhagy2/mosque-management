<?php 
 
 
namespace App\Enums;

// الحالة الفنية للمسجد
enum MosqueConditionEnum: string
{
    case WEAK = 'weak';
    case AVERAGE = 'average';
    case GOOD = 'good';
    case EXCELLENT = 'excellent';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            'weak' => 'ضعيفة',
            'average' => 'متوسطة',
            'good' => 'جيدة',
            'excellent' => 'ممتازة',
        ];
    }
}