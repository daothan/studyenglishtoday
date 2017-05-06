<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;

use App\User;

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
print_r($errors);die;
        $data = new User;
        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->level    = $request->input('level');

        if($data->save()){
    	   return redirect()->route('admin.user.show')->with(['flash_level'=>'success', 'flash_message'=>'Add user successfully.']);
        }
    }

    /*Edit User*/
    public function getEdit($id){
        $user = User::where('id',$id)->get();

        return view('admin.user.edit', compact('user'));
    }

    public function postEdit($id, Request $request){

        $rules = [
            'name'                  => 'required|unique:users,name,'.$id,
            'email'                 => 'required|unique:users,email,'.$id,
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ];

        $messages = [
            'name.required'                  => 'Please enter username.',
            'name.unique'                    => 'Username is exist.',

            'email.required'                 => 'Please enter email.',
            'email.unique'                   => 'Email is exist.',

            'password.required'              => 'Please enter password.',
            'password.confirmed'             => 'Password is not match.',
            'password.min'                   => 'Password must more than 6 characters.',

            'password_confirmation.required' => 'Please enter password.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $user = User::find($id);
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->level    = $request->input('level');

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($user->save()){
                return redirect()->route('admin.user.show')->with(['flash_level'=>'success', 'flash_message'=>'Update user successfully.']);
            }
        }
    }

    /*Delete User*/
    public function delete($id){
        $user_id = User::where('id',$id)->get()->toArray();

        foreach ($user_id as $value) {
            $check_admin = $value["level"];
        }

        if($check_admin == 0){ /*If admin, do not have permission deleting*/

            echo "<script type='text/javascript'>
                alert('Sorry ! You can not delete admin account ! ');
                window.location ='";echo route('admin.user.show');
                echo "'
                </script>";

        }else{
            $user = User::find($id);
            $user -> delete($id);

            return redirect()->route('admin.user.show')->with(['flash_level'=>'danger', 'flash_message'=>'Delete successfully.']);
        }
    }
}
