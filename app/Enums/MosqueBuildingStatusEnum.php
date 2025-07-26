<?php 

namespace App\Enums;

//  حالة مبنى المسجد 
//الوضع الحالي
enum MosqueBuildingStatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PARTIALLY_DESTROYED = 'partially_destroyed';
    case FULLY_DESTROYED = 'fully_destroyed';
    case UNDER_REPAIR = 'under_repair';
    case UNDER_CONSTRUCTION = 'under_construction';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            'active' => 'فعال',
            'inactive' => 'غير فعال',
            'partially_destroyed' => 'مدمر جزئيا',
            'fully_destroyed' => 'مدمر كليا',
            'under_repair' => 'قيد الترميم',
            'under_construction' => 'قيد البناء',
        ];
    }
}