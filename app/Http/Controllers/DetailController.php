<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DetailRequest;

use App\Detail;
use App\Category;

class DetailController extends Controller
{
	/*Show details*/
	public function show(){
        $detail = Detail::orderBy('id','DESC')->get();
		return view('admin.detail.show', compact('detail'));
	}

    /*Add details*/
    public function getAdd(){
    	$cate_parent = Category::select('id', 'name', 'parent_id') -> get() -> toArray();

    	return view('admin.detail.add', compact('cate_parent'));
    }

    public function postAdd(DetailRequest $request){
        $data = new Detail;

        $file_name         = $request->file('images')->getClientOriginalName();
        $data->tittle      = $request->input('tittle');
        $data->alias       = convert_vi_to_en($request->input('tittle'));
        $data->introduce   = $request->input('introduce');
        $data->content     = htmlentities($request->input('content'));
        $data->images      = $file_name;
        $data->keywords    = $request->input('keywords');
        $data->description = $request->input('description');
        $data->user_id     = 1;
        $data->cate_id     = $request->input('cate_id');

        $request->file('images')->move('storage/uploads/image_uploads/',$file_name);

        if($data->save()){
            return redirect()->route('admin.detail.show')->with(['flash_level'=>'success', 'flash_message'=>'Add detail successfully']);
        }
    }

    /*Edit details*/
    public function getEdit($id){

    }

    public function postEdit($id){

    }

    /*Delete detail*/
    public function delete($id){
        $parent = Detail::where('cate_id', $id)->count();
        if($parent==0){
            $detail = Detail::find($id);
            $detail->delete();

            return redirect()->route('admin.detail.show')->with(['flash_level'=>'danger', 'flash_message'=>'Delete successfully']);
        }else{
            echo "<script type='text/javascript'>
                alert('Sorry ! you can not delete this category');
                window.location='";
                    echo route('admin.detail.show');
            echo "'
                </script>";
        }
    }

    /*View Content*/
    public function content($id){
        
    }
}
