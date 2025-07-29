<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MosqueType extends Model
{
    public $fillable = [
        'mosque_id',
        'type',
        'created_at',
        'updated_at',
    ];


    public function mosque(): BelongsTo
    {
        return $this->belongsTo(Mosque::class);
    }
}
