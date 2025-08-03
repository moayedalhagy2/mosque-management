<?php

namespace App\Http\Controllers;

use App\Enums\WorkerEducationalLevelEnum;
use App\Enums\WorkerJobStatusEnum;
use App\Enums\WorkerJobTitleEnum;
use App\Enums\WorkerQuranHifzLevelEnum;
use App\Enums\WorkerSponsorshipTypeEnum;
use App\Http\Requests\Worker\StoreWorkerRequest;
use App\Http\Requests\Worker\UpdateWorkerRequest;
use App\Http\Resources\WrapCollection;


use App\Http\Resources\WrokerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class WorkerController extends Controller
{
    public function index(Request $request)
    {
        $model = QueryBuilder::for(Worker::class)
            ->allowedFilters([
                AllowedFilter::exact('id'),
                AllowedFilter::exact('job_title'),
                AllowedFilter::exact('job_status'),
                AllowedFilter::exact('quran_levels'),
                AllowedFilter::exact('sponsorship_types'),
                AllowedFilter::exact('educational_level'),
                AllowedFilter::exact('salary'),
                AllowedFilter::exact('salary_sy'),
                AllowedFilter::exact('sham_cash'),
                'name',
                'phone',
                'mosque.name',
                'mosque.id',
            ])
            ->allowedSorts(['id', 'created_at', 'job_title', 'job_status'])
            ->with(['mosque.district', 'creator', 'editor']);


        return new WrapCollection($model->paginate($this->pageSize()), WrokerResource::class);
    }


    public function show(Request $request, Worker $item)
    {
        $item->load(['mosque', 'creator', 'editor']);

        return $this->successJson(new WrokerResource($item));
    }


    public function store(StoreWorkerRequest $request)
    {

        $data = $request->validated();

        $item = Worker::create($data);

        if ($request->has('image')) {

            $item
                ->addMedia($data['image'])
                ->usingName(random_int(100000000, 999999999))
                ->toMediaCollection(class_basename(Worker::class));
        }

        $item->load(['mosque']);


        return $this->successJson(new WrokerResource($item), 201);
    }


    public function update(UpdateWorkerRequest $request, Worker $item)
    {

        $data = $request->validated();

        $item->update($data);
        if ($request->has('image')) {

            $item
                ->addMedia($data['image'])
                ->usingName(random_int(100000000, 999999999))
                ->toMediaCollection(class_basename(Worker::class));
        }



        return $this->successJson([], 204);
    }



    public function destroy(Request $request, Worker $item)
    {
        $item->delete();

        return $this->successJson([], 204);
    }



    //enums
    public function jobTitlesEnum()
    {
        return $this->successJson(WorkerJobTitleEnum::values());
    }
    public function jobStatusEnum()
    {
        return $this->successJson(WorkerJobStatusEnum::values());
    }

    public function quranLevelEnum()
    {
        return $this->successJson(WorkerQuranHifzLevelEnum::values());
    }
    public function sponsorshipTypeEnum()
    {
        return $this->successJson(WorkerSponsorshipTypeEnum::values());
    }
    public function educationalLevelEnum()
    {
        return $this->successJson(WorkerEducationalLevelEnum::values());
    }
}
