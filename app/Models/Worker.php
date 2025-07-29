<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Worker extends Model implements HasMedia
{
    use InteractsWithMedia;
    public $fillable = [
        'name',
        'phone',
        'mosque_id',
        'job_title',
        'job_status',
        'created_at',
        'updated_at',
    ];


    //InteractsWithMedia
    public function registerMediaCollections(): void
    {
        // default collection (As Model name & must have one image)
        $this
            ->addMediaCollection(class_basename($this))
            ->useFallbackUrl(asset('storage/static-images/placeholder.svg'))
            ->onlyKeepLatest(1);
    }
    public function mosque()
    {
        return $this->belongsTo(Mosque::class);
    }
}
