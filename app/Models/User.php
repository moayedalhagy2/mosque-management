<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use  HasApiTokens;

    use \Spatie\Permission\Traits\HasRoles;
    use \Mattiverse\Userstamps\Traits\Userstamps;
    protected $guard_name = 'sanctum';

    protected $fillable = [
        'name',
        'username',
        'password',
        'is_active',
        'branch_id'
    ];


    protected $hidden = [
        'password',
        'branch_id'

    ];


    public function isAnyAdmin()
    {
        return $this->hasAnyRole([
            RoleEnum::BRANCH_MANAGER,
            RoleEnum::SUPERVISOR,
            RoleEnum::SYSTEM_ADMINISTRATOR
        ]);
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_active' => 'boolean'
        ];
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
