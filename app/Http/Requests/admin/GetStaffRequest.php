<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetStaffRequest extends FormRequest
{
    public function validationData()
    {
        $data = parent::ValidationData();

        if (isset($data['render']) && in_array(strtolower($data['render']), ['true', 'false'])) {
            // Chuyển đổi giá trị của trường "render" thành kiểu boolean
            $data['render'] = filter_var($data['render'], FILTER_VALIDATE_BOOLEAN);
        }

        return $data;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->level >= 3;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "render" => ["nullable", "boolean"],
            "search" => ["nullable", "string"],
            "date" => ["nullable", "date_format:Y-m-d"],
            "level" => ["nullable", "integer", "min:-1", "max:4"],
        ];
    }
}
