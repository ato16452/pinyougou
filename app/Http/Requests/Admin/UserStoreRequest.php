<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => 'required|unique:tb_user|regex:/^[a-zA-Z0-9_-]{4,16}$/',
            'password' => 'required|regex:/^[\w]{6,}$/',
            'repassword' => 'required|same:password',
            'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'email' => 'required',
        ];
    }
    public function messages()
    {
        return [
            //提示信息
            'username.required' =>'用户名不能为空',
            'username.unique' =>'用户名已存在',
            'username.regex' =>'4到16位（字母，数字，下划线，减号）',
            'password.required' =>'密码不能为空',
            'password.regex' =>'密码不能少于6位',
            'repassword.required' =>'确认密码不能为空',
            'repassword.same' =>'两次密码不一致',
            'phone.required' =>'手机号不能为空',
            'phone.regex' =>'手机号格式不正确',
            'email.required' =>'邮箱不能为空',
            'email.email' =>'邮箱格式不正确',
        ];
    }
}
