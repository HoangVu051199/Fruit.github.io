<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendNewsRequest extends FormRequest
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
            'catenew_id' => 'required',
            'title'      => 'required|unique:news,title,' . $this->id,
            'image'      => 'required',
            'contents'   => 'required',
            'status'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'catenew_id.required' => 'Dữ liệu không được để trống',
            'title.required'      => 'Dữ liệu không được để trống',
            'title.unique'        => 'Dữ liệu đã tồn tại',
            'image.required'      => 'Dữ liệu không được để trống',
            'contents.required'    => 'Dữ liệu không được để trống',
            'status.required'     => 'Dữ liệu không được để trống',
        ];
    }
}
