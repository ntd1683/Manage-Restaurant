<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class ProfileRequest extends FormRequest
{
    public function validationData(): array
    {
        $original = parent::ValidationData();

        if (isset($original["g-recaptcha-response"])){
            $original["score"] = RecaptchaV3::verify($original["g-recaptcha-response"], 'register');
        }

        return $original;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "min:5"],
            "phone" => ["required", "string", "min:5", "max:15"],
            "id_card" => ["required", "string", "min:5", "max:32"],
            "birthday" => ["nullable", "date",],
            "gender" => ["required", "integer", "min:0", "max:1"],
            "old_password" => ["nullable", "string", "min:3", "max:32"],
            "new_password" => ["nullable", "string", "min:3", "max:32", "different:old_password"],
            "g-recaptcha-response" => ["required"],
            "score" => ["required", "numeric", "min:0.5", "max:0.99"],
        ];
    }

    public function messages(): array
    {
        return [
            "string" => trans("Unknown error please try again"),
            "min:5" => trans("Fields must be more than 5 characters"),
            "phone.max:15" => trans("Fields must be less than 15 characters"),
            "max:32" => trans("Fields must be less than 32 characters"),
            "date" => trans("Fields must be a date"),
            "integer" => trans("Unknown error please try again"),
            "gender.min:0" => trans("Unknown error please try again"),
            "gender.max:1" => trans("Unknown error please try again"),
            "new_password.different" => trans("New password must be different from old password"),
            "score.required" => "Looks like you're spamming",
            "score.numeric" => "Looks like you are spamming",
            "score.min:0.5" => "Looks like you are spamming",
            "score.max:0.99" => "Looks like you are spamming",
        ];
    }
}
