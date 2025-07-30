<?php

namespace App\Models;


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
        'is_active'
    ];


    protected $hidden = [
        'password',
        'branch_id'

    ];


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
