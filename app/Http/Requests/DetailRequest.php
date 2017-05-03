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
            'cate_id' => 'required',
            'tittle' => 'required|unique:details,tittle',
            'content' => 'required',
            'images' => 'required|image',
            'keywords' => 'required'
        ];
    }

    public function messages(){
        return [
            'cate_id.required' => 'Please choose parent category.',

            'tittle.required' => 'Please enter tittle.',
            'tittle.unique' => 'Tittle has already exist.',

            'content.required' => 'Please enter content.',

            'images.required' => 'Please choose pictures.',
            'images.image' => 'The images must be an image.',

            'keywords.required' => 'Please enter keywords.'
        ];
    }
}
