<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    /*Show USers*/
    public function show(){
        $user = User::orderBy('id','DESC')->get();

    	return view('admin.user.show', compact('user'));
    }

    /*Add users*/
    public function getAdd(){

    	return view('admin.user.add');
    }

    /*Show information User*/

    public function information(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = User::find($id);
            return response()->json($info);
        }
        /*$user_id = $user_detail->id;
        $user_level = $user_detail->level;
        $user_current_id = Auth::user()->id;
        $user_current_level = Auth::user()->level;

        if($user_current_level == 2){
            if($user_current_id == $user_id || $user_level >1){
                return view('user_interface.user_account.user_information', compact('user'));
            }else{
                echo "<script type='text/javascript'>
                alert('Sorry ! You can not see this account information !');
                window.location ='";echo route('admin.user.show');
                echo "'
                </script>";
            }
        }

        if($user_current_level == 1){
            if($user_current_id == $user_id || $user_level >1){
                return view('admin.user.information', compact('user'));
            }else{
                echo "<script type='text/javascript'>
                alert('Sorry ! You can not see this account information !');
                window.location ='";echo route('admin.user.show');
                echo "'
                </script>";
            }
        }

        if($user_current_level == 0){
        }
           return view('admin.user.information', compact('user_detail'));
    }*/
    }

}
