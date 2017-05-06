<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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
            'name'                  => 'required|unique:users,name|max:50',
            'email'                 => 'required|unique:users,email|email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'level'                 => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'                   => 'Please enter username.',
            'name.unique'                     => 'Username is exists.',
            'name.max'                        => 'Username must less than 50 characters.',

            'email.required'                  => 'Please enter email.',
            'email.unique'                    => 'Email is exists.',
            'email.email'                     => 'Invalid email.',

            'password.required'               => 'Please enter password.',
            'password.confirmed'              => 'Password is not match.',
            'password.min'                    => 'Password must more than 6 characters.',

            'password_confirmation.required'  => 'Please enter confirm password.',

            'level.required'                  => 'Please choose level'
        ];
    }
}
