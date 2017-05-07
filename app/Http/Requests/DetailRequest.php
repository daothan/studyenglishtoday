<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'cate_id'  => 'required',
            'title'   => 'required|unique:details,title',
            'content'  => 'required',
            'images'   => 'required|image',
            'keywords' => 'required'
        ];
    }

    public function messages(){
        return [
            'cate_id.required'  => 'Please choose parent category.',

            'title.required'   => 'Please enter title.',
            'title.unique'     => 'Title has already exist.',

            'content.required'  => 'Please enter content.',

            'images.required'   => 'Please choose pictures.',
            'images.image'      => 'The images must be an image.',

            'keywords.required' => 'Please enter keywords.'
        ];
    }
}
