<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\MessageBag;


class CategoryController extends Controller
{
	/*Show categories*/
	public function show(){
		$data = Category::orderBy('id', 'DESC')->get();

		return view ('admin.cate.show', compact('data'));
	}

	/*Add category*/
    public function getAdd(){
        $parent = Category::select('id', 'name', 'parent_id') -> get() -> toArray();
    	return view('admin/cate/add', compact('parent'));
    }

    public function postAdd(CategoryRequest $request){
    	$data = new Category;

    	$data->name = $request -> input('name');
    	$data->alias = convert_vi_to_en($request -> input('name'));
    	$data->order = $request -> input('order');
    	$data->parent_id = $request -> input('parent_id');
    	$data->keywords = $request -> input('keywords');
    	$data->description = $request -> input('description');

    	if($data->save()){
    		return redirect() -> route('admin.cate.show') -> with(['flash_level' =>'success', 'flash_message' => 'Add category successfully']);
    	}
    }

    /*Delete Category*/
    public function delete($id){

        $parent = Category::where('parent_id',$id)->count();

        if($parent == 0){
            $category = Category::find($id);
            $category->delete($id);

            return redirect() -> route('admin.cate.show') -> with(['flash_level'=>'danger', 'flash_message'=> 'Delete successfully']);
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry ! You can not delete this category ');
                window.location ='";
                    echo route('admin.cate.show');
                echo "'
                </script>";
        }

    }


    /*Edit category*/
    public function getEdit($id){

        $category = Category::where('id',$id)->get();

    	return view('admin.cate.edit', compact('category'));
    }

    public function postEdit(CategoryRequest $request){
        $data = new Category;

        $data->name = $request -> input('name');
        $data->alias = convert_vi_to_en($request -> input('name'));
        $data->order = $request -> input('order');
        $data->parent_id = $request -> input('parent_id');
        $data->keywords = $request -> input('keywords');
        $data->description = $request -> input('description');

        if($data->save()){
            return redirect() -> route('admin.cate.show') -> with(['flash_level' =>'success', 'flash_message' => 'Edit category successfully']);
        }
    }
}
