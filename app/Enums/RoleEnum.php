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

    /**
     * الحصول على التسمية العربية للدور
     */
    public function label(): string
    {
        return match ($this) {
            self::FIELD_COMMITTEE => 'اللجنة الميدانية',
            self::BRANCH_MANAGER => 'مدیر الفرع',
            self::SUPERVISOR => 'المشرف المركزي',
            self::SYSTEM_ADMINISTRATOR => 'مسؤول النظام',
        };
    }

    /**
     * الحصول على كل الأدوار مع تسمياتها
     */
    public static function getAll(): array
    {
        $roles = [];
        foreach (self::cases() as $role) {
            $roles[$role->value] = $role->label();
        }
        return $roles;
    }
}
