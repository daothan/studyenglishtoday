<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
     /*REGISTER FOR MODAL*/

    public function postRegister_modal(Request $request){

        $rules = [
            'name'                  => 'required|unique:users,name|max:50',
            'email'                 => 'required|unique:users,email|email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ];
        $messages = [
            'name.required'                   => 'Please enter username.',
            'name.unique'                     => 'Username is exists.',
            'name.max'                        => 'Username must less than 50 characters.',

            'email.required'                  => 'Please enter email.',
            'email.unique'                    => 'Email is exists.',
            'email.email'                     => 'Invalid email.',

            'password.required'               => 'Please enter password.',
            'password.confirmed'              => 'Password is not match.',
            'password.min'                    => 'Password must more than 6 characters.',

            'password_confirmation.required'  => 'Please enter confirm password.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_register'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $data = new User;
            $data->name     = $request->input('name');
            $data->email    = $request->input('email');
            $data->password = bcrypt($request->input('password'));
            $data->level    = 2; /*Register just become a member*/

            if($data->save()){
                $request->session()->flash('alert-success', 'Registration successful with account '.': "'.$request->input('name').'"');
            }
        }
    }
}
