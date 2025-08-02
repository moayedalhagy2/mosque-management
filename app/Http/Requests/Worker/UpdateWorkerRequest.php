<?php

namespace App\Http\Requests\Worker;

use App\Services\ExceptionService;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\WorkerEducationalLevelEnum;
use App\Enums\WorkerJobStatusEnum;
use App\Enums\WorkerJobTitleEnum;
use App\Enums\WorkerQuranHifzLevelEnum;
use App\Enums\WorkerSponsorshipTypeEnum;
use App\Rules\MaxWorkersPerJobTitleRule;
use Illuminate\Validation\Rule;


class UpdateWorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected $stopOnFirstFailure = true;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $branchId = auth()->user()->branch_id ??
            (request()->has('branch_id') ?
                request()->branch_id
                :  ExceptionService::branchIdRequired());

        $workerId = $this->route('item')?->id; // للتعديل فقط



        return [

            'mosque_id' => ['sometimes',  Rule::exists('mosques', 'id')
                ->where(function ($query) use ($branchId) {
                    $query->where('branch_id', $branchId);
                })],
            "name" => ['required'],
            "phone" => ['sometimes', 'unique:workers,phone'],
            'image' => ['sometimes',  'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'job_status' => ['sometimes', Rule::in(WorkerJobStatusEnum::values())],
            'quran_levels' => ['sometimes', Rule::in(WorkerQuranHifzLevelEnum::values())],
            'sponsorship_types' => ['sometimes', Rule::in(WorkerSponsorshipTypeEnum::values())],
            'educational_level' => ['sometimes', Rule::in(WorkerEducationalLevelEnum::values())],
            'job_title' => [
                'sometimes',
                Rule::in(WorkerJobTitleEnum::values()),
                new MaxWorkersPerJobTitleRule(
                    $this->mosque_id,
                    $this->job_title,
                    $workerId
                )
            ],

        ];
    }
}
