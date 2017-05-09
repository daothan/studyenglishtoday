<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DetailRequest;

use App\Detail;
use App\Category;
use App\DetailImage;
use Validator;
use Auth;

use File;

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
        $data->title       = $request->input('title');
        $data->alias       = convert_vi_to_en($request->input('title'));
        $data->introduce   = $request->input('introduce');
        $data->content     = $request->input('content');
        $data->images      = $file_name;
        $data->keywords    = $request->input('keywords');
        $data->description = $request->input('description');
        $data->user_id     = Auth::user()->id;
        $data->cate_id     = $request->input('cate_id');

        $folder = 'storage/uploads/detail_images/' . $request->input('title');

        if(!file_exists($folder)){
            File::makeDirectory($folder, 0777, true);
        }
        $request->file('images')->move($folder,$file_name);

        if($data->save()){
            return redirect()->route('admin.detail.show')->with(['flash_level'=>'success', 'flash_message'=>'Add detail successfully']);
        }else{
            echo "error";die;
        }
    }

    /*Edit details*/
    public function getEdit($id){
        $cate_parent = Category::select('id','name', 'parent_id')->get()->toArray();
        $detail = Detail::where('id', $id)->get();

        $detail_image = Detail::find($id)->detailimage->toArray();

        return view('admin.detail.edit', compact('cate_parent', 'detail', 'detail_image'));
    }

    public function postEdit($id, Request $request){

        $detail = Detail::find($id);

        $rules = [
            'title' => 'required|unique:details,title,'.$id
        ];

        $messages = [
            'title.required' => 'Title can not be empty.',
            'title.unique' => 'Title is exist.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);


        $current_image = ('storage/uploads/detail_images/'.$detail["title"].'/'.$detail["images"]);

        if(!empty($request->file('images'))){

            $file_name = $request->file('images')->getClientOriginalName();

            $detail->images  = $file_name;
            $detail->save();
            $request->file('images')->move('storage/uploads/detail_images/'.$detail["title"].'/',$file_name);

            if(File::exists($current_image)){
                File::delete($current_image);
            }
        }

        /*$file_name           = $request->file('file_name')->getClientOriginalName();*/
        $detail->title      = $request->input('title');
        $detail->alias       = convert_vi_to_en($request->input('title'));
        $detail->introduce   = $request->input('introduce');
        $detail->content     = htmlentities($request->input('content'));
        $detail->keywords    = $request->input('keywords');
        $detail->description = $request->input('description');
        $detail->user_id     = Auth::user()->id;
        $detail->cate_id     = $request->input('cate_id');


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            if($detail->save()){
                return redirect()->route('admin.detail.show')->with(['flash_level'=>'success', 'flash_message'=>'Edit detail successfully.']);
            }
        }
    }

    /*Delete detail*/
    public function delete($id){
        /*Delete images from detail_images*/
        $detail_images = Detail::find($id)->detailimage->toArray();
        foreach($detail_images as $value){
            File::delete('storage/uploads/detail_images/'.$value["images"]);
        }
        /*Delete images from details*/
        $detail = Detail::find($id);
        File::deleteDirectory('storage/uploads/detail_images/'.$detail->title);
        if($detail->delete($id)){
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
        $content = Detail::where('id',$id)->get();
        return view('admin.detail.content', compact('content'));
    }
}
