<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// the governorates in our system is : branch
// branch = governorate
class Branch extends Model
{


    protected $fillable = [
        'name',
    ];


    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
