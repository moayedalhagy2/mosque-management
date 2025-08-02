<?php

namespace App\Http\Requests\Mosque;

use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueTypeEnum;
use App\Enums\MosqueAttachmentsEnum;
use App\Enums\MosqueDemolitionPercentageEnum;
use App\Enums\MosqueDestructionStatusEnum;
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
            'current_status' => ['sometimes', Rule::in(MosqueBuildingStatusEnum::values())],
            'technical_status' => ['sometimes', Rule::in(MosqueConditionEnum::values())],
            'category' => ['sometimes', Rule::in(MosqueCategoryEnum::values())],
            'mosque_attachments' => ['sometimes', Rule::in(MosqueAttachmentsEnum::values())],
            'demolition_percentage' => ['sometimes', Rule::in(MosqueDemolitionPercentageEnum::values())],
            'destruction_status' => ['sometimes', Rule::in(MosqueDestructionStatusEnum::values())],
            'types' => ['sometimes', 'array'],
            'types.*' => ['sometimes', Rule::in(MosqueTypeEnum::values()), 'distinct'],
            'description' => ['sometimes'],
            'latitude' => ['sometimes'],
            'longitude' => ['sometimes'],
            'district_id' => ['sometimes',  Rule::exists('districts', 'id')
                ->where(function ($query) use ($branchId) {
                    $query->where('branch_id', $branchId);
                })],

        ];
    }
}
