<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use App\Http\Resources\WrapCollection;
use App\Models\Branch;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $model = QueryBuilder::for(Branch::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('code'),
                'name',
            ])
            ->allowedSorts(['id', 'created_at'])
            ->withCount(['districts', 'mosques']);


        if ($this->isList()) {
            // Return all data, only 'id' and 'name' attributes
            $branches = $model->get(['id', 'name']);
            return $this->successJson(BranchResource::collection($branches));
        }

        return new WrapCollection($model->paginate($this->pageSize()), BranchResource::class);
    }
}
