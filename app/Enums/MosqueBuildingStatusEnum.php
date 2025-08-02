<?php

namespace App\Enums;

//  حالة مبنى المسجد 
//الوضع الحالي
enum MosqueBuildingStatusEnum: string
{
    case READY = 'جاهز';
    case WAITING_RENOVATION = 'بانتظار الترميم';
    case UNDER_RENOVATION = 'قيد الترميم';
    case RENOVATED = 'تم ترميمه';
    case UNDER_CONSTRUCTION = 'قيد البناء';
    case BUILT = 'تم بناؤه';
    case OTHER_DENOMINATIONS_ACTIVE = 'طوائف أخرى مفعل';
    case OTHER_DENOMINATIONS_INACTIVE = 'طوائف أخرى غير مفعل';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
