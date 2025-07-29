<?php

namespace App\Http\Controllers;

use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueTypeEnum;
use App\Http\Requests\Mosque\StoreMosqueRequest;
use App\Http\Requests\Mosque\UpdateMosqueRequest;
use App\Http\Resources\DistrictResource;
use App\Http\Resources\MosqueResource;
use App\Http\Resources\WrapCollection;

use App\Models\District;
use App\Models\Mosque;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MosquesController extends Controller
{
    public function index(Request $request)
    {
        $model = QueryBuilder::for(Mosque::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('category'),
                AllowedFilter::exact('current_status'),
                AllowedFilter::exact('technical_status'),
                'name',
                'branch.name',
                'branch.id',
                'district.name',
                'district.id',
                'types.type'
            ])
            ->allowedSorts(['id', 'created_at', 'category', 'current_status', 'technical_status'])
            ->with(['branch', 'district', 'types']);


        return new WrapCollection($model->paginate($this->pageSize()), MosqueResource::class);
    }


    public function show(Request $request, Mosque $item)
    {
        $item->load(['branch', 'district', 'types']);
        return $this->successJson(new MosqueResource($item));
    }


    public function store(StoreMosqueRequest $request)
    {

        $data = $request->validated();

        $item = Mosque::create($data);

        if ($request->has('types')) {
            // ['A','B'] ==> ['type'=>'A','type'=>'B']
            $formattedArray = array_map(fn($item) => ['type' => $item], $data['types']);

            $item
                ->types()
                ->createMany($formattedArray);
        }

        $item->load(['branch', 'district', 'types']);

        return $this->successJson(new MosqueResource($item), 201);
    }


    public function update(UpdateMosqueRequest $request, Mosque $item)
    {

        $data = $request->validated();

        $item->update($data);

        if ($request->has('types')) {
            // ['A','B'] ==> ['type'=>'A','type'=>'B']
            $formattedArray = array_map(fn($item) => ['type' => $item], $data['types']);

            $item
                ->types()
                ->delete();

            $item
                ->types()
                ->createMany($formattedArray);
        }

        return $this->successJson([], 204);
    }



    public function destroy(Request $request, Mosque $item)
    {
        $item->delete();

        return $this->successJson([], 204);
    }



    //enums
    public function currentStatusEnum()
    {
        return $this->successJson(MosqueBuildingStatusEnum::values());
    }
    public function categoryEnum()
    {
        return $this->successJson(MosqueCategoryEnum::values());
    }
    public function technicalStatusEnum()
    {
        return $this->successJson(MosqueConditionEnum::values());
    }
    public function typeEnum()
    {
        return $this->successJson(MosqueTypeEnum::values());
    }
}
