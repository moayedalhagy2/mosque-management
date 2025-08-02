<?php

namespace App\Enums;

//الشهادة الدراسية
enum WorkerEducationalLevelEnum: string
{
    case NONE = 'لا يوجد شهادة';
    case BASIC_EDUCATION = 'تعليم أساسي';
    case GENERAL_SECONDARY = 'ثانوية عامة';
    case ISLAMIC_SECONDARY = 'ثانوية شرعية';
    case GENERAL_DIPLOMA = 'معهد متوسط عام';
    case ISLAMIC_DIPLOMA = 'معهد متوسط شرعي';
    case GENERAL_BACHELOR = 'إجازة عامة';
    case SHARIA_BACHELOR = 'إجازة في الشريعة';
    case MASTERS = 'ماجستير';
    case PHD = 'دكتوراه';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
