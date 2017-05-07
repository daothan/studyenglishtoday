<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
	/*public function __construct(){
		$this->middleware('auth',['except'=>'logout']);
	}*/


    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    }

    public function getLogin(){

        return view('account/login');
    }

    public function postLogin(LoginRequest $request){

		$name     = $request->input('name');
		$password = $request->input('password');
		$level    = 1; /*admin*/

    	if(Auth::attempt(['name'=>$name, 'password'=>$password],$request->has('remember'))){
    		return redirect('admin')->with(['flash_level'=>'success', 'flash_message'=>'Welcome '.$name]);

    	}else{
    		return redirect()->back()->with(['flash_level'=>'danger', 'flash_message'=>'Username or Password wrong .'])->withInput();
    	}

    }

    public function logout(){
    	Auth::logout();
    	return redirect()->back();
    }
}
