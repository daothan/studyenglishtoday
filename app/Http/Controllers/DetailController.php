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
		return view('admin.detail.detail_show', compact('detail'));
	}

    /*Add category*/
    public function getadddetail(){
        $category = Category::select('id', 'name', 'parent_id')->get();
        foreach ($category as $parent) {
            $id=$parent->id;
            $cate = Category::where('parent_id',$id)->get();
            $cate_parent = Category::where('parent_id',!$id)->get();
            return response()->json(array(['parent'=>$cate_parent, 'cate'=>$cate, 'category'=>$category]));
        }

    }

    public function add(Request $request){
        $rules =[
            'tittle' => 'unique:details,tittle'
        ];
        $messages=[
            'tittle.unique' => "Tittle has adready exists."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_detail'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $detail = new Detail;

            /*Request data*/
            $detail->tittle = $request->tittle;
            $detail->alias = convert_vi_to_en(($request->tittle));
            $detail->introduce=$request->introduce;
            $detail->content=$request->content;
            $detail->user_id = Auth::user()->id;
            $detail->cate_id = $request->category;

            if($detail->save()){
                $request->session()->flash('alert-success','Add'.$request->tittle.' successfully.');
            }

        }
    }
}