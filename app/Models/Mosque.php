<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mosque extends Model
{

    use \Mattiverse\Userstamps\Traits\Userstamps;

    use \App\BranchScopeTrait;

    public $fillable = [
        'name',
        'branch_id',
        'district_id',
        'category',
        'current_status',
        'technical_status',
        'mosque_attachments',
        'demolition_percentage',
        'destruction_status',
        'description',
        'latitude',
        'longitude',
        'created_at',
        'updated_at',
    ];


    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class); //branch_id
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class); //district_id
    }

    public function types(): HasMany
    {
        return $this->hasMany(MosqueType::class);
    }


    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class);
    }
}
