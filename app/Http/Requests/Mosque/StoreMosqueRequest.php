<?php

namespace App\Http\Requests\Mosque;

use App\Enums\MosqueAttachmentsEnum;
use App\Enums\MosqueBuildingStatusEnum;
use App\Enums\MosqueCategoryEnum;
use App\Enums\MosqueConditionEnum;
use App\Enums\MosqueDemolitionPercentageEnum;
use App\Enums\MosqueDestructionStatusEnum;
use App\Enums\MosqueTypeEnum;
use App\Services\ExceptionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMosqueRequest extends FormRequest
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
            "name" => ['required'],
            'current_status' => ['required', Rule::in(MosqueBuildingStatusEnum::values())],
            'technical_status' => ['required', Rule::in(MosqueConditionEnum::values())],
            'category' => ['required', Rule::in(MosqueCategoryEnum::values())],
            'mosque_attachments' => ['required', Rule::in(MosqueAttachmentsEnum::values())],
            'demolition_percentage' => ['required', Rule::in(MosqueDemolitionPercentageEnum::values())],
            'destruction_status' => ['required', Rule::in(MosqueDestructionStatusEnum::values())],
            'types' => ['required', 'array'],
            'types.*' => ['required', Rule::in(MosqueTypeEnum::values()), 'distinct'],
            'description' => ['sometimes'],
            'latitude' => ['sometimes'],
            'longitude' => ['sometimes'],
            'district_id' => ['required',  Rule::exists('districts', 'id')
                ->where(function ($query) use ($branchId) {
                    $query->where('branch_id', $branchId);
                })],

        ];
    }
}
