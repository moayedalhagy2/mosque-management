<?php

namespace App\Enums;

enum WorkerJobStatusEnum: string
{
    case PERMANENT = 'دائم';
    case CONTRACT = 'متعاقد';
    case VOLUNTEER = 'متطوع';
    case TEMPORARY = 'مؤقت';



    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
