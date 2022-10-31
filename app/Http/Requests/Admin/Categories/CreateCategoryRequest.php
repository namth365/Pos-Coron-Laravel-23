<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
                'name' => 'required|unique:categories|max:255',
                'description' => 'required|max:255'
            ],
            [
                'name.unique' => 'Tên thể loại đã có ',
                'name.required' => 'Phải có tên thể loại',
                'description.required' => 'Phải có tên mô tả',
            ]
        ];
    }
}
