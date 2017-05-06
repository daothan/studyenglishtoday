<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
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
        $data = new User;
        $data->name     = $request->input('name');
        $data->email    = $request->input('email');
        $data->password = bcrypt($request->input('password'));
        $data->level    = $request->input('level');

        if($data->save()){
    	   return redirect()->back()->with(['flash_level'=>'success', 'flash_message'=>'Add user successfully.']);
        }
    }

    /*Edit User*/
    public function getEdit($id){

    }

    public function postEdit($id){

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
