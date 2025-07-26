<?php 
 
 
namespace App\Enums;

// الفئة
enum MosqueCategoryEnum: string
{
    case A = 'A';
    case B = 'B';
    case C = 'C';
    case D = 'D';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            'A' => 'أ',
            'B' => 'ب',
            'C' => 'ج',
            'D' => 'د',
        ];
    }
}