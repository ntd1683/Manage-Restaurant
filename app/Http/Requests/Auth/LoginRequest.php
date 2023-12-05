<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ! Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ["required", "email"],
            'password' => ["required", "string", "min:4", "max:32"],
            'remember' => ["nullable"],
        ];
    }

    public function messages(): array
    {
        return [
            "required" => trans("Not be empty"),
            "email" => trans("Unknown error please try again"),
            "string" => trans("Unknown error please try again"),
            "min:4" => trans("Fields must be more than 4 characters"),
            "max:32" => trans("Fields must be less than 32 characters"),
        ];
    }
}
