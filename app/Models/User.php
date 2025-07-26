<?php

namespace App\Models;

 
use Illuminate\Foundation\Auth\User as Authenticatable;
 
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use   HasApiTokens;

  
    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    
    protected $hidden = [
        'password',
        
    ];


    protected function casts(): array
    {
        return [
  
            'password' => 'hashed',
        ];
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
