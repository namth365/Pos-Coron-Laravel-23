<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
                'name' => 'required|unique:products|max:255',
                'sold' => 'required|max:255',
                'price' => 'required|max:255',
                'description' => 'required|max:255'
            ],
            [
                'name.unique' => 'Tên sản phẩm đã có ',
                'name.required' => 'Phải có tên sản phẩm',
                'sold.required' => 'Phải có số lượng',
                'price.required' => 'Phải có giá',
                'description.required' => 'Phải có mô tả sản phẩm',
            ]
        ];
    }
}
