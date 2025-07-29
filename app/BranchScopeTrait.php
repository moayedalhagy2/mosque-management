<?php

namespace App;

use App\Models\Scopes\BranchScope;
use App\Services\ExceptionService;
use Illuminate\Support\Facades\Auth;

trait BranchScopeTrait
{
    protected static function booted()
    {
        static::addGlobalScope(new BranchScope);

        static::creating(function ($model) {

            $user = Auth::user();

            if ($user) {
                // إذا كان المستخدم مديراً كاملاً (branch_id = null)
                if (is_null($user->branch_id)) {

                    if (!request()->has('branch_id')) {
                        ExceptionService::branchIdRequired();
                    }
                    $model->branch_id = request('branch_id');
                    return;
                }

                // للمستخدمين العاديين (لديهم branch_id)
                if (request()->has('branch_id') && request('branch_id') != $user->branch_id) {
                    ExceptionService::useYourBranchOnly();
                }

                $model->branch_id = $user->branch_id;
            }
        });
    }
}
