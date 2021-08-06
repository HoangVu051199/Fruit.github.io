<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendCategoryRequest extends FormRequest
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
            'name' => 'required|unique:category,name,'. $this->id,
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Dữ liệu không được để trống',
            'name.unique'   => 'Dữ liệu đã tồn tại',
            'status.required' => 'Dữ liệu không được để trống',
        ];
    }
}
