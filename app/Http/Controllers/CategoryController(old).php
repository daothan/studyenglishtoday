<?php

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

	/*Add category*/
    public function getAdd(){
        $parent = Category::select('id', 'name', 'parent_id') -> get() -> toArray();
    	return view('admin/cate/add', compact('parent'));
    }

    public function postAdd(CategoryRequest $request){
    	$data = new Category;

        $data->name        = $request -> input('name');
        $data->alias       = convert_vi_to_en($request -> input('name'));
        $data->order       = $request -> input('order');
        $data->parent_id   = $request -> input('parent_id');
        $data->keywords    = $request -> input('keywords');
        $data->description = $request -> input('description');

    	if($data->save()){
    		return redirect() -> route('admin.cate.show') -> with(['flash_level' =>'success', 'flash_message' => 'Add category successfully']);
    	}
    }


    /*Edit category*/
    public function getEdit($id){

        $category = Category::where('id',$id)->get();
        $parent = Category::select('id', 'name', 'parent_id') -> get() -> toArray();

    	return view('admin.cate.edit', compact('category','parent'));
    }

    public function postEdit(Request $request, $id){

        $rules=[
            'name'=>'required'
        ];
        $message=[
            'name.required' => 'Name can not be empty.'
        ];

        $validator=Validator::make($request->all(), $rules, $message);

        $data = Category::find($id);

        $data->name        = $request -> input('name');
        $data->alias       = convert_vi_to_en($request -> input('name'));
        $data->order       = $request -> input('order');
        $data->parent_id   = $request -> input('parent_id');
        $data->keywords    = $request -> input('keywords');
        $data->description = $request -> input('description');

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($data->save()){
                return redirect() -> route('admin.cate.show') -> withErrors($validator)->with(['flash_level' =>'success', 'flash_message' => 'Edit category successfully']);
            }
        }
    }

    /*Delete Category*/
    public function delete($id){

        $parent = Category::where('parent_id',$id)->count();

        if($parent == 0){
            $category = Category::find($id);
            $category->delete($id);

            return redirect() -> route('admin.cate.show') -> with(['flash_level'=>'danger', 'flash_message'=> 'Delete successfully']);
        }else{ /*If having parent category, can not deleting*/
            echo "<script type='text/javascript'>
                alert('Sorry ! You can not delete this category ');
                window.location ='";
                    echo route('admin.cate.show');
                echo "'
                </script>";
        }

    }

}