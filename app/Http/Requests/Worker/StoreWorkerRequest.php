<?php

namespace App\Http\Requests\Worker;

use App\Enums\WorkerJobStatusEnum;
use App\Enums\WorkerJobTitleEnum;
use App\Rules\MaxWorkersPerJobTitleRule;
use App\Services\ExceptionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWorkerRequest extends FormRequest
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

        return [
            "name" => ['required'],
            "phone" => ['sometimes', 'unique:workers,phone'],

            'job_status' => ['required', Rule::in(WorkerJobStatusEnum::values())],
            'image' => ['sometimes',  'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'mosque_id' => ['required',  Rule::exists('mosques', 'id')
                ->where(function ($query) use ($branchId) {
                    $query->where('branch_id', $branchId);
                })],
            'job_title' => [
                'sometimes',
                Rule::in(WorkerJobTitleEnum::values()),
                new MaxWorkersPerJobTitleRule(
                    $this->mosque_id,
                    $this->job_title,
                    null
                )
            ]

        ];
    }
}
