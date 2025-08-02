<?php

namespace App\Enums;

//ملحقات المسجد
enum MosqueAttachmentsEnum: string
{
    case NONE = 'لا يوجد';
    case SODA = 'سدة';
    case BASEMENT = 'قبو';
    case SODA_AND_BASEMENT = 'سدة وقبو';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
