<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
	/*public function __construct(){
		$this->middleware('auth',['except'=>'logout']);
	}*/
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }


    /*LOGIN FOR MODAL*/
    public function postLogin_modal(Request $request){

        $rules = [
            'username' => 'required',
            'user_password' => 'required'
        ];
        $messages = [
            'username.required'     => 'Please enter username.',
            'user_password.required' => 'Please enter password.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error'   =>true,
                'message' =>$validator->errors()
                ],200);
        }else{
            $name     = $request -> input('username');
            $password = $request -> input('user_password');

            if(Auth::attempt(['name'=>$name, 'password'=>$password])){
                $level = Auth::user()->level;
                $username = Auth::user()->name;
                return response()->json([
                'level'    =>true,
                'value'    =>$level,
                'username' =>$username
                ],200);

            }else{
                $errors = new MessageBag(['errorlogin'=>'Username or Password wrong.']);
                return response()->json([
                'error'   =>true,
                'message' =>$errors
                ],200);
            }
        }
    }

    /*Logout*/
    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
}
