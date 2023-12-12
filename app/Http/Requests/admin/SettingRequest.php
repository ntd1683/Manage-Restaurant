<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->level == 4;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "site_name" => ["required", "string", "min:4"],
            "slogan" => ["required", "string", "min:4"],
            "logo_light" => ["image", "mimes:jpeg,png,jpg", "max:3072", "nullable"],
            "logo_dark" => ["image", "mimes:jpeg,png,jpg", "max:3072", "nullable"],
            "site_address" => ["required", "string", "min:4"],
            "email" => ["required", "email"],
            "phone" => ["required", "string", "min:5", "max:15"],
            "lat" => ["required", "numeric"],
            "lng" => ["required", "numeric"],
        ];
    }

    public function messages(): array
    {
        return [
            "image" => trans("Invalid image"),
            "mimes:jpeg,png,jpg" => trans("uploaded image must be png, jpg, jpeg file"),
            "max:3072" => trans("Images must be under 3072 kb"),
            "email" => trans("Unknown error please try again"),
            "string" => trans("Unknown error please try again"),
            "min:4" => trans("Fields must be more than 4 characters"),
            "phone.max:15" => trans("Fields must be less than 15 characters"),
            "numeric" => trans("Unknown error please try again"),
        ];
    }
}
