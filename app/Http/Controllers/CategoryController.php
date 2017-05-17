<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\MessageBag;
use Validator;

class CategoryController extends Controller
{

	/*Show categories*/
	public function show(){
		$data = Category::orderBy('id', 'DESC')->get();

		return view ('admin.cate.show1', compact('data'));
	}


    /*Show information category*/
    public function view_cate_detail(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Category::find($id);
            return response()->json($info);
        }
    }

    /*Add category*/
    public function addcate(Request $request){
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
