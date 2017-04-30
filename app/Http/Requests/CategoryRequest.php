<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Category;

class CategoryRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name|max:50',
            'order'=> 'required|numeric',
            'keywords' =>'required',
            'description' => 'required'

        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
