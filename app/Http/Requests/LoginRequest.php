<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }
}
