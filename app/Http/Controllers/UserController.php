<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use Auth;

use App\User;

class UserController extends Controller
{
    /*Show USers*/
    public function show(){
        $user = User::orderBy('id','DESC')->get();

    	return view('admin.user.show', compact('user'));
    }

    /*Show information User*/
    public function information($id){
        $user = User::where('id',$id) -> get();
        foreach($user as $user_login){
            $user_id = $user_login["id"];
            $user_level = $user_login["level"];
        }
        $user_current_id = Auth::user()->id;
        $user_current_level = Auth::user()->level;

        if($user_current_level == 2){
            if($user_current_id == $user_id || $user_level >1){
                return view('user_interface.user_information', compact('user'));
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
            return view('admin.user.information', compact('user'));
        }
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

    /*Edit User*/
    public function getEdit($id){
        $user = User::where('id',$id)->get();
        foreach($user as $user_login){
            $user_id    = $user_login["id"]; /*Id of user which you are wanting to edit*/
            $user_level = $user_login["level"]; /*Level of user which you are wanting to edit*/
        }
        $user_current_login = Auth::user()->level; /*Level of user which you are logging in*/
        $user_current_id    = Auth::user()->id; /*Id of user which you are logging in*/

        /*Member can not edit other member or admin, super admin*/
        if($user_current_login == 2){
            if($user_current_id == $user_id){ /*Member just have permission editing themself*/
                return view('user_interface.user_edit', compact('user'));

            }else{
                echo "<script type='text/javascript'>
                alert('Sorry ! You can not edit this account  ');
                window.location ='";echo route('admin.user.show');
                echo "'
                </script>";
            }
        }
        if($user_current_login==1){
            if($user_current_id == $user_id || $user_level >1){ /*Admin have permission editing themself and member*/
                return view('admin.user.edit', compact('user'));
            }else{
                echo "<script type='text/javascript'>
                alert('Sorry ! You can not edit this account !');
                window.location='"; echo route('admin.user.show');
                echo "'
                </script>";
            }
        }
        if($user_current_login==0){/*Super admin can edit any account*/
            return view('admin.user.edit', compact('user'));
        }
    }

    public function postEdit($id, Request $request){

        $rules = [
            'email'                 => 'required|unique:users,email,'.$id,
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ];

        $messages = [
            'email.required'                 => 'Please enter email.',
            'email.unique'                   => 'Email is exist.',

            'password.required'              => 'Please enter password.',
            'password.confirmed'             => 'Password is not match.',
            'password.min'                   => 'Password must more than 6 characters.',

            'password_confirmation.required' => 'Please enter password.'
        ];
        $validator          = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'edit_user'   =>true,
                'messages'    =>$validator->errors()
                ],200);
        }else{
            $user               = User::find($id);
            $user->email    = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->level    = $user->level;

            if($user->save()){
                $request->session()->flash('alert-success', 'Update account successfully.');
            }else{
                print_r("Has an error when edit account !");die;
            }
        }
    }

    /*Delete User*/
    public function delete($id){
        $user_current_login = Auth::user()->level;
        $user_id            = User::where('id',$id)->get()->toArray();

        foreach ($user_id as $value) {
            $admin_id = $value["level"];
        }

        if($user_current_login == 2){ /*If member, do not have permission deleting*/
            echo "<script type='text/javascript'>
                alert('Sorry ! You do not have permission to delete account ! ');
                window.location ='";echo route('admin.user.show');
                echo "'
                </script>";

        }elseif($user_current_login == 1){ /*If admin, have permision deleting member*/
            if($admin_id>=2){
                $user = User::find($id);
                $user -> delete($id);

                return redirect()->route('admin.user.show')->with(['flash_level'=>'danger', 'flash_message'=>'Delete successfully.']);
            }else{
                echo "<script type='text/javascript'>
                    alert('Sorry ! You just have permision to delete admin and super admin !');
                    window.location='";echo route('admin.user.show'); echo "'
                </script>";
            }
        }elseif($user_current_login == 0){
            if($admin_id>=1){ /*Super admin can delete member and admin*/
                $user = User::find($id);
                $user -> delete($id);
                 return redirect()->route('admin.user.show')->with(['flash_level'=>'danger', 'flash_message'=>'Delete successfully.']);
            }else{/*Cannot delete super admin*/
                echo "<script type='text/javascript'>
                    alert('Sorry ! You do not have permision to delete super admin !');
                    window.location='";echo route('admin.user.show'); echo "'
                </script>";
            }
        }

    }
}
