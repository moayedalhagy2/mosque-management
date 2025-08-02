<?php

namespace App\Enums;

//الوضع الوظيفي
enum WorkerJobStatusEnum: string
{

    case ACTIVE = 'قائم على رأس عمله';
    case RESIGNED = 'استقالة';
    case ON_LEAVE = 'إجازة';
    case TEMPORARILY_SUSPENDED = 'مفصول مؤقت';
    case TERMINATED = 'مفصول نهائي';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
