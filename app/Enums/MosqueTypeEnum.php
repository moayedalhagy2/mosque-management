<?php 

namespace App\Enums;

//  نوع المسجد 
enum MosqueTypeEnum : string{
   case PUBLIC = 'public';
    case CENTRAL = 'central';
    case MINISTERIAL = 'ministerial';
    case HISTORICAL = 'historical';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            'public' => 'عام',
            'central' => 'مركزي',
            'ministerial' => 'وزاري',
            'historical' => 'أثري',
        ];
    }
}