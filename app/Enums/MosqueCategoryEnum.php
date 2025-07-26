<?php 
 
 
namespace App\Enums;

// الفئة
 
enum MosqueCategoryEnum: string
{
    case A = 'أ';
    case B = 'ب';
    case C = 'ج';
    case D = 'د';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

}