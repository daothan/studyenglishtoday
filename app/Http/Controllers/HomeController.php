<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home_member()
    {
        return view('member.home_member');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function user_interface(){
        return view('user_interface.user_home');
    }

    /*LOGIN FOR MODAL*/
    public function getLogin_modal(){

        return view('user.home');
    }

    public function postLogin_modal(Request $request){

        $rules = [
            'name' => 'required',
            'password' => 'required'
        ];
        $messages = [
            'name.required'     => 'Please enter username.',
            'password.required' => 'Please enter password.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error'   =>true,
                'message' =>$validator->errors()
                ],200);
        }else{
            $name     = $request -> input('name');
            $password = $request -> input('password');

            if(Auth::attempt(['name'=>$name, 'password'=>$password])){
                return response()->json([
                'error'   =>false,
                'message' =>'success'
                ],200);


            }else{
                $errors = new MessageBag(['errorlogin'=>'Email or Password wrong.']);
                return response()->json([
                'error'   =>true,
                'message' =>$errors
                ],200);
            }
        }
    }

    /*REGISTER FOR MODAL*/
    public function getRegister_modal(){

        return view('user.home');
    }

    public function postRegister_modal(Request $request){

        $rules = [
            'name'                  => 'required|unique:users,name|max:50',
            'email'                 => 'required|unique:users,email|email',
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'level'                 => 'required'
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

            'password_confirmation.required'  => 'Please enter confirm password.',

            'level.required'                  => 'Please choose level'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error'=>true,
                'message'=>$validator->errors()
                ],200);
        }else{
            $data = new User;
            $data->name     = $request->input('name');
            $data->email    = $request->input('email');
            $data->password = bcrypt($request->input('password'));
            $data->level    = 2; /*Register just become a member*/

            if($data->save()){
               return response()->json([
                'error'=>true,
                'message'=>'Register successfully.'
                ],200);

            }
        }
    }
}
