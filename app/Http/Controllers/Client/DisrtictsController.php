<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\WrapCollection;

use App\Models\District;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DisrtictsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $model = QueryBuilder::for(District::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'name',
                'mosques.name'
            ])
            ->get(['id', 'name']);

        return $this->successJson(DistrictResource::collection($model));
    }
}
