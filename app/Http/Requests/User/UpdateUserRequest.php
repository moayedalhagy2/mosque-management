<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    protected $stopOnFirstFailure = true;

    public function rules(): array
    {

        return [
            'name' => ['sometimes'],
            'username' => ['sometimes', 'min:5'],
            'password' => ['sometimes', 'min:8'],
            'is_active' => ['sometimes', 'boolean'],
            'role' => ['sometimes', Rule::in(RoleEnum::values())],
            // if user has branch will return true to prohibited rule
            'branch_id' => ['sometimes', Rule::prohibitedIf(fn() => !is_null($this->item->branch)), 'exists:branches,id']
        ];
    }
}
