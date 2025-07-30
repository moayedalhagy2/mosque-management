<?php

namespace App\Enums;

enum RoleEnum: string
{
    case FIELD_COMMITTEE = 'field_committee';      // اللجنة الميدانية
    case BRANCH_MANAGER = 'branch_manager';        // مدير الفرع
    case  SUPERVISOR = 'supervisor'; // المشرف المركزي
    case SYSTEM_ADMINISTRATOR = 'system_administrator'; // مسؤول النظام

    /**
     * الحصول على القيم كقائمة
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
