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
                $username = $request->input('name');;
                return response()->json([
                    'register'    =>true,
                    'username' =>$username
                ],200);
                $new_account = [
                    'name'   => $request->input('name'),
                    'action' => "Account has just registered",
                    'tittle' => $request->input('email'),
                    'link'   => route('admin.user.show')
                ];
                Mail::send('user_interface.notifications.add_detail', $new_account,function($msg){
                    $msg->from('daothan12111@gmail.com', 'New account registered successfull');
                    $msg->to('daothan12111@gmail.com','Quoc Than')->subject('New account registered studyenglishtoday.org');
                });
            }
        }
    }
}
