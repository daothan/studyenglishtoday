<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;

class RegisterController extends Controller
{
     public function getRegister(){
     	return view('account.register');
     }

     public function postRegister(RegisterRequest $request){
     	$data = new User;
        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->level    = 2; /*Register just become a member*/

        if($data->save()){
    	   return redirect()->route('home')->with(['flash_level'=>'success', 'flash_message'=>'Register successfully.']);
        }
     }
}
