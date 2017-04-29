<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;


class CategoryController extends Controller
{
	/*Show categories*/
	public function show(){
		$data = Category::all();
		return view ('admin/cate/show', compact('data'));
	}

	/*Add category*/
    public function getAdd(){
    	return view('admin/cate/add');
    }

    public function postAdd(CategoryRequest $request){
    	$data = new Category;

    	$data->name = $request -> input('name');
    	$data->alias = $request -> input('name');
    	$data->order = $request -> input('order');
    	$data->parent_id = 1;
    	$data->keywords = $request -> input('keywords');
    	$data->description = $request -> input('description');

    	if($data->save()){
    		return redirect() -> route('admin.cate.show') -> with(['flash_level' =>'success', 'flash_message' => 'Add category successfully']);
    	}
    }

    /*Edit category*/
    public function editcate(){
    	return view('admin/cate/edit');
    }
}
