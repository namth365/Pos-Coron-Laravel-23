<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CompleteCartRequest extends FormRequest
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
            [
                'name' => 'required|max:255',
                'phone' =>'required|max:255',
                'address' => 'required|max:255',
                'email' => 'required|max:255',
                // 'password' => 'required|max:255',
    
            ],
            [
                'name.required' => 'Điền tên khách hàng',
                'phone.required' => 'Điền số điện thoại',
                'address.required' => 'Điền địa chỉ',
                'email.required' => 'Điền email',
                // 'password.required' => 'Điền mật khẩu',
            ]
        ];
    }
}
