<?php 

namespace App\Enums;

//  حالة مبنى المسجد 
//الوضع الحالي
enum MosqueBuildingStatusEnum: string
{
     case ACTIVE = 'فعال';
    case INACTIVE = 'غير فعال';
    case PARTIALLY_DESTROYED = 'مدمر جزئياً';
    case UNDER_RENOVATION = 'قيد الترميم';
    case UNDER_CONSTRUCTION = 'قيد البناء';
    case CLOSED = 'مغلق';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}