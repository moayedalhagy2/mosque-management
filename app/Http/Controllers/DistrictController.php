<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistrictResource;
use App\Http\Resources\WrapCollection;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $model = QueryBuilder::for(District::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                'name',
                'branch.name',
                'branch.id',
            ])
            ->allowedSorts(['id', 'created_at'])
            ->with(['creator', 'editor'])
            ->withCount('mosques');



        if ($this->isList()) {
            // Return all data, only 'id' and 'name' attributes
            $data = $model->get(['id', 'name']);
            return $this->successJson(DistrictResource::collection($data));
        }

        return new WrapCollection($model->paginate($this->pageSize()), DistrictResource::class);
    }


    public function show(Request $request, District $item)
    {
        $item->load(['creator', 'editor']);

        return $this->successJson(new DistrictResource($item));
    }


    public function update(Request $request, District $item)
    {


        $validated = $request->validate([
            'name' => ['required', 'string', 'unique:districts,name,' . request('item')->id],
        ]);

        $item->update($validated);

        return $this->successJson([], 204);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('districts')->where(function ($query) use ($request) {
                    return $query->where('branch_id', $request->branch_id);
                }),
            ],
            'branch_id' => ['required', 'exists:branches,id', 'integer'], // Ensure branch_id exists
        ]);


        return $this->successJson(new DistrictResource(District::create($validated)), 201);
    }


    public function destroy(Request $request, District $item)
    {

        $item->delete();

        return $this->successJson([], 204);
    }
}
