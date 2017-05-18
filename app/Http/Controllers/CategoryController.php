<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Auth;
use Illuminate\Support\MessageBag;
use Validator;

class CategoryController extends Controller
{

	/*Show categories*/
	public function show(){
		$data = Category::orderBy('id', 'DESC')->get();
        $parent = Category::select('id', 'name', 'parent_id')->get();

		return view ('admin.cate.show', compact('data','parent'));
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
            'add_name'        => 'unique:users,name'
        ];
        $messages = [
            'add_name.unique'                => 'Username is exists.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_cate'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $data = New Category;
            $data->name        = $request -> input('add_name');
            $data->alias       = convert_vi_to_en($request -> input('add_name'));
            $data->order       = $request -> input('add_order');
            $data->parent_id   = $request -> input('add_parent');
            $data->keywords    = $request -> input('add_keywords');
            $data->description = $request -> input('add_description');

            if($data->save()){
                $request->session()->flash('alert-success', 'Registration successful with account '.': '.$request->input('name'));
            }
        }
    }

    /*Edit Category*/
    public function view_edit(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_cate=Category::find($id);

            $user_current_level=Auth::user()->level;

            /*Admin cannot edit parent category*/
            if($user_current_level==1 && $info_cate->parent_id==0){
                $error=new MessageBag(['errorEdit'=>"You can not edit this category"]);
                return response()->json([
                        'erroredit'=>true,
                        'messages'=>$error
                    ],200);
            }else{
                return response()->json($info_cate);
            }

            /*Super admin can edit all category*/
            if($user_current_level==0){
                return response()->json($info_cate);
            }
        }
    }

    public function edit(Request $request){

    }

}