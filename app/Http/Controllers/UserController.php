<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use App\User;
use App\Social;
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
            $user_id_info=$info->id;
            $user_social=Social::where('user_id', $user_id_info)->get();
            $social="";
            foreach ($user_social as $user_social){
	            $social = [
	            	'provider'=>$user_social->provider,
	            ];
            }
            /*Check level user having view other details*/
            $view_id = $info->id;
	        $view__level = $info->level;
	        $user_current_id = Auth::user()->id;
	        $user_current_level = Auth::user()->level;

            if($user_current_level == 1){/*If admin, can see member*/
	            if($user_current_id == $view_id || $view__level >1){
	                return response()->json(array('info'=>$info,'user_social'=>$social));
	            }else{
	                $errors = new MessageBag(['errorView'=>'You can not see this account details.']);
	                return response()->json([
	                'errorview' =>true,
	                'message' =>$errors
	                ],200);
	            }
	        }

	        if($user_current_level == 0){ /*Super Admin can see all member and admin*/
		        return response()->json(array('info'=>$info,'user_social'=>$social));
		    }
	    }
    }

}
