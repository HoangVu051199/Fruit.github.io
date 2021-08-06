<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendPermissionRequest extends FormRequest
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
            'display_name' => 'required|unique:permissions,display_name,'. $this->id,
        ];
    }

    public function message()
    {
        return [
            'display_name.required' => 'Dữ liệu không được để trống',
            'display_name.unique' => 'Dữ liệu đã tồn tại',
        ];
    }
}
