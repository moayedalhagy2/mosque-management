<?php

namespace App\Http\Requests\User;

use App\Enums\RoleEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
        $role = $this->role;
        return [
            'name' => ['required'],
            'username' => ['required', 'min:5'],
            'password' => ['required', 'min:8'],
            'is_active' => ['sometimes', 'boolean'],
            'role' => ['required', Rule::in(RoleEnum::values())],
            'branch_id' => [Rule::requiredIf(function () use ($role) {
                return in_array($role, [RoleEnum::FIELD_COMMITTEE->value, RoleEnum::BRANCH_MANAGER->value]);
            }), 'exists:branches,id']
        ];
    }
}
