<?php

namespace App\Enums;

enum WorkerJobTitleEnum: string
{
    case PREACHER = 'خطیب';
    case MUEZZIN = 'مؤذن';
    case SERVANT = 'خادم';
    case IMAM = 'إمام';
    case IMAM_PREACHER = 'إمام وخطیب';
    case IMAM_MUEZZIN = 'إمام ومؤذن';
    case MUEZZIN_SERVANT = 'مؤذن وخادم';
    case IMAM_PREACHER_MUEZZIN = 'إمام وخطیب ومؤذن';
    case IMAM_MUEZZIN_SERVANT = 'إمام ومؤذن وخادم';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
