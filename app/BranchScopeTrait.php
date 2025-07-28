<?php

namespace App;

use App\Models\Scopes\BranchScope;

trait BranchScopeTrait
{
    protected static function booted()
    {
        static::addGlobalScope(new BranchScope);
    }
}
