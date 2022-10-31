<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class PostRegisterRequest extends FormRequest
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
                'email' => 'required|unique:customers|max:255',
                'phone' => 'required|unique:customers|max:255',
                'address' => 'required|max:255'
          ],
          [
                'email.unique' => 'Email đã tồn tại',
                'email.required' => 'Phải có email',
                'name.required' => 'Phải có tên',
                'phone.unique' => 'Số điện thoại đã tồn tại',
                'phone.required' => 'Phải có số điện thoại',
                'address.required' => 'Phải có địa chỉ'
          ]
        ];
    }
}
