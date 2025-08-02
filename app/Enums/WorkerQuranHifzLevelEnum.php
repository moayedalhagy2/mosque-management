<?php

namespace App\Enums;


//درجة الحفظ من القرآن

enum WorkerQuranHifzLevelEnum: string
{
    case ONE_TO_FOUR = '1-4 جزء';
    case FIVE_TO_TEN = '5-10 جزء';
    case ELEVEN_TO_TWENTY = '11-20 جزء';
    case TWENTYONE_TO_THIRTY = '21-30 جزء';
    case IJAZAH = 'إجازة';
    case IJAZAH_TEN_QIRAAT = 'إجازة بالقراءات العشر';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
