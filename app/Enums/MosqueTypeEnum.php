<?php 

namespace App\Enums;

//  نوع المسجد 
enum MosqueTypeEnum: string
{
    case GENERAL = 'عام';
    case CENTRAL = 'مركزي';
    case MINISTERIAL = 'وزاري';
    case HISTORICAL = 'أثري';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}