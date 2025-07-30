<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use \Mattiverse\Userstamps\Traits\Userstamps;

    public $fillable = [
        "branch_id",
        "name"
    ];

    public $timestamps = false;

    // belong to branch (governorate)
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function mosques(): HasMany
    {
        return $this->hasMany(Mosque::class);
    }
}
