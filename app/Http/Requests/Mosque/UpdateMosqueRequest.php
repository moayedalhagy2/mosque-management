<?php

namespace App\Http\Requests\Mosque;

use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueTypeEnum;
use App\Services\ExceptionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMosqueRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected $stopOnFirstFailure = true;


    public function rules(): array
    {


        $branchId = auth()->user()->branch_id ??
            (request()->has('branch_id') ?
                request()->branch_id
                :  ExceptionService::branchIdRequired());

        return [
            "name" => ['sometimes'],
            'district_id' => ['sometimes',  Rule::exists('districts', 'id')
                ->where(function ($query) use ($branchId) {
                    $query->where('branch_id', $branchId);
                })],
            'current_status' => ['sometimes', Rule::in(MosqueBuildingStatusEnum::values())],
            'technical_status' => ['sometimes', Rule::in(MosqueConditionEnum::values())],
            'category' => ['sometimes', Rule::in(MosqueCategoryEnum::values())],
            'types' => ['sometimes', 'array'],
            'types.*' => ['sometimes', Rule::in(MosqueTypeEnum::values()), 'distinct'],
            'latitude' => ['sometimes'],
            'longitude' => ['sometimes'],

        ];
    }
}
