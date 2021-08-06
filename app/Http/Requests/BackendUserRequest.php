<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BackendUserRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validation = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $this->id,
            'phone' => 'required', 
            'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'birthday' => 'required',
            'status' => 'required',
            'role_id' => 'required',
        ];
        if($request->submit !== 'update'){
            $validation['password'] = 'required';
            $validation['password_confirmation'] = 'required|same:password';
        }

        return $validation;
    }

    public function messages()
    {
        return [
            'name.required' => 'Dữ liệu không được để trống',
            'email.required' => 'Dữ liệu không được để trống',
            'email.unique' => 'Dữ liệu đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Dữ liệu không được để trống',
            'password.required' => 'Dữ liệu không được để trống',
            'password_confirmation.required' => 'Dữ liệu không được để trống',
            'password_confirmation.same' => 'Mật khẩu không khớp',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'birthday.required' => 'Dữ liệu không được để trống',
            'status.required' => 'Dữ liệu không được để trống',
            'role_id.required' => 'Dữ liệu không được để trống',
        ];
    }
}
