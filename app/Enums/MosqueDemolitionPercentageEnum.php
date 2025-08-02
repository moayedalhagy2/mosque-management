<?php

namespace App\Enums;


//نسبة الهدم
enum MosqueDemolitionPercentageEnum: string
{
    case NONE = 'لا يوجد';
    case FULL_100 = '100%';
    case SEVERE_75 = '75%';
    case HALF_50 = '50%';
    case PARTIAL_25 = '25%';
    case MINOR_5 = '5%';
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
