<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackendPromotion_ProductRequest extends FormRequest
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
            'name'        => 'required|unique:promotion_product,name,'.$this->id,
            'product_id'  => 'required',
            'type_sale'   => 'required',
            'sale'   => 'required',
            'start'       => 'required',
            'finish'      => 'required|date|after:tomorrow',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Dữ liệu không được để trống',
            'name.unique' => 'Dữ liệu đã tồn tại',
            'product_id.required' => 'Dữ liệu không được để trống',
            'type_sale.required' => 'Dữ liệu không được để trống',
            'sale.required' => 'Dữ liệu không được để trống',
            'start.required'      => 'Dữ liệu không được để trống',
            'finish.required'     => 'Dữ liệu không được để trống',
            'finish.after'     => 'Ngày nhập phải sau ngày đã cho',
        ];
    }
}
