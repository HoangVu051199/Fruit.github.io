<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendSliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'    => 'required',
            'position' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Dữ liệu không được để trống',
            'position.required' => 'Dữ liệu không được để trống',
            'status.required' => 'Dữ liệu không được để trống',
        ];
    }
}
