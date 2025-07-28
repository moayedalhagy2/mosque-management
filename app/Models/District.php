<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{

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
}
