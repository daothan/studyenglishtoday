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

        return view ('admin.cate.cate_show', compact('data'));
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
    public function getaddcate(){
        $category = Category::select('id', 'name', 'parent_id')->get();
        foreach ($category as $parent) {
            $id=$parent->id;
            $cate = Category::where('parent_id',$id)->get();
            $cate_parent = Category::where('parent_id',!$id)->get();
            return response()->json(array(['parent'=>$cate_parent, 'cate'=>$cate, 'category'=>$category]));
        }

    }
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
                $request->session()->flash('alert-success', 'Add '.$request->input('add_name').' successful');
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
                $error=new MessageBag(['errorEdit'=>"This category could be edit by Super_admin"]);
                return response()->json([
                        'erroredit'=>true,
                        'messages'=>$error
                    ],200);
            }else{/*Super admin can edit all category*/
                /*Show category*/
                $category = Category::select('id', 'name', 'parent_id')->get();
                $id_edit = ['id'=>$info_cate->parent_id];
                foreach ($category as $parent) {
                    $id=$parent->id;
                    $cate = Category::where('parent_id',$id)->get();
                    $cate_parent = Category::where('parent_id',!$id)->get();
                    return response()->json(array(
                        [
                            'parent'=>$cate_parent,
                            'cate'=>$cate,
                            'category'=>$category,
                            'id_edit'=>$id_edit ,
                            'info' => $info_cate
                        ]
                    ));
                }
                /*End show category*/
            }
        }
    }

    public function edit(Request $request){

        $id=$request->old_id_edit;
        $rules = [
            'edit_order' => 'required',
            ];
        $messages = [
            'edit_order.required' => 'Please enter password.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_edit_cate'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $cate_edit = Category::find($id);
            $cate_edit->parent_id = $request->edit_parent;
            $cate_edit->order = $request->edit_order;
            $cate_edit->keywords = $request->edit_keyword;
            $cate_edit->description = $request->edit_description;

            if($cate_edit->save()){
                $request->session()->flash('alert-success', 'Update user successful.');
            }
        }
    }

    public function delete_view(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info=Category::find($id);
            $cate_info_id=$info->id;
            $cate_info_parent=$info->parent_id;

            $user_current_id=Auth::user()->id;
            $user_current_level=Auth::user()->level;

            if($user_current_level==1){ /*Admin can not delete parent category*/
                if($cate_info_parent==0){
                    return response()->json([
                        'error_delete_cate'=>true,
                        ]);
                }else{
                    return response()->json($info);
                }
            }
            if($user_current_level==0){/*Super admin can delete all category*/
                return response()->json($info);
            }
        }
    }
    public function delete(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $cate_delete=Category::find($id);

            $cate_delete->delete($id);
        }
    }

}