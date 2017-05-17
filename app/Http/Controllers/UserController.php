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

    public function postAdd(UserRequest $request){
        $data = new User;
        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->level    = $request->input('level');

        if($data->save()){
    	   return redirect()->route('admin.user.show')->with(['flash_level'=>'success', 'flash_message'=>'Add user successfully.']);
        }
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

    /*Update user*/
    public function view_edit(Request $request)
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
	            if($user_current_id == $view_id || $view__level >1 && $social == ""){
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
     public function edit(Request $request)
        {
			$rules = [
	            'password'              => 'required|confirmed|min:6',
	            'password_confirmation' => 'required'
	        ];
	        $messages = [
	            'password.required'               => 'Please enter password.',
	            'password.confirmed'              => 'Password is not match.',
	            'password.min'                    => 'Password must more than 6 characters.',

	            'password_confirmation.required'  => 'Please enter confirm password.'
	        ];
	        $id=$request->old_id;

	        $validator = Validator::make($request->all(), $rules, $messages);
	        if($validator->fails()){
	            return response()->json([
	                'error_edit'=>true,
	                'messages'=>$validator->errors()
	                ],200);
	        }else{
	            $user = User::find($id);
	            $user->password = bcrypt($request->old_password);
	            $user->level    = 2; /*Register just become a member*/

	            if($user->save()){
	                $request->session()->flash('alert-success', 'Update user successful.');
	            }
	        }
        }

        /*
        *   Delete record
        */
    public function delete_view(Request $request)
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
	            if($view__level >1){
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
    public function delete(Request $request)
    {
    	if($request->ajax()){
	        $id = $request->id;

	        $user = User::find($id);
	        $user -> delete($id);
        }
    }

    public function add(Request $request){
    	 $rules = [
            'add_name'                  => 'unique:users,name',
            'add_email'                 => 'unique:users,email',
            'add_password'              => 'confirmed',
            'add_password_confirmation' => 'required'
        ];
        $messages = [
            'add_name.unique'                     => 'Username is exists.',
            'add_email.unique'                    => 'Email is exists.',
            'add_password.confirmed'              => 'Password is not match.',
            'password_confirmation.required'  => 'Please enter confirm password.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_user'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $data = new User;
            $data->name     = $request->input('add_name');
            $data->email    = $request->input('add_email');
            $data->password = bcrypt($request->input('add_password'));
            $data->level    = 2; /*Register just become a member*/

            if($data->save()){
                $request->session()->flash('alert-success', 'Registration successful with account '.': '.$request->input('name'));
            }
        }
    }

}
