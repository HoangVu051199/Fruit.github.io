<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontendCheckoutRequest extends FormRequest
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
            'customer_name' => 'required',
            'customer_phone' => ['required', 'regex:/(0(3[0-9]|5[0-9]|7[0-9]|8[0-9]))[0-9]{7}/'],
            'customer_email' => 'required|email',
            'customer_address' => 'required',
            'provinces' => 'required',
            'districts' => 'required',
            'wards' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'customer_name.required' => 'Vui lòng nhập họ và tên', 
           'customer_phone.required' => 'Vui lòng nhập số điện thoại', 
           'customer_phone.regex' => 'Số điện thoại không hợp lệ', 
           'customer_email.required' => 'Vui lòng nhập email', 
           'customer_email.email' => 'Vui lòng nhập địa một chỉ email hợp lệ', 
           'customer_address.required' => 'Vui lòng nhập địa chỉ', 
           'provinces.required' => 'Vui lòng chọn tỉnh', 
           'districts.required' => 'Vui lòng chọn huyện', 
           'wards.required' => 'Vui lòng chọn xã', 
        ];
    }
}
