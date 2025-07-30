<?php


namespace App\Helpers;

use App\Enums\RoleEnum;

class RoleMiddleware
{

    public static function rolesFormatter(...$roles)
    {
        // تحويل جميع الأدوار إلى strings
        $processedRoles = array_map(function ($role) {
            if ($role instanceof \BackedEnum) {
                return $role->value; // للحصول على القيمة من Enum
            }
            return (string) $role; // للتأكد من أننا نحصل على string
        }, $roles);

        return 'role:' . implode('|', $processedRoles);
    }


    //اضافة اداور بشكل مسبق حتى لا يتم تكرار اضافته
    public static function append(...$roles)
    {
        if (!in_array(RoleEnum::SYSTEM_ADMINISTRATOR, $roles)) {
            //add in first pos
            array_unshift($roles, RoleEnum::SYSTEM_ADMINISTRATOR);
        }
        return self::rolesFormatter(...$roles);
    }
}
