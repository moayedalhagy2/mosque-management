<?php

namespace App\Enums;

//طبيعة الكفالة
enum WorkerSponsorshipTypeEnum: string
{
    case FULL_SPONSORSHIP = 'كفالة كلية';
    case PARTIAL_SPONSORSHIP = 'كفالة جزئية';
    case MOSQUE_OR_CHARITY_FUND = 'صندوق المسجد أو الجمعيات';
    case NOT_SPONSORED = 'غير مكفول نهائي';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
