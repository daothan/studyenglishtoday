<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DetailRequest;
use App\Detail;
use App\Category;
use App\Listening;
use Validator;
use Auth;
use Illuminate\Validation\Rule;

class DetailController extends Controller
{

	/*Show details*/
	public function show(){
        $detail = Detail::orderBy('id','DESC')->get();
		return view('admin.detail.detail_show', compact('detail'));
	}

    /*Add Detail*/
    public function get_add_detail(){
        $category = Category::select('id', 'name', 'parent_id')->get();
        foreach ($category as $parent) {
            $id=$parent->id;
            $cate = Category::where('parent_id',$id)->get();
            $cate_parent = Category::where('parent_id',!$id)->get();
            return response()->json(array(['parent'=>$cate_parent, 'cate'=>$cate, 'category'=>$category]));
        }

    }

    public function post_add_detail(Request $request){
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
            $detail->alias = tittle(($request->tittle));
            $detail->type = $request->type_article;
            $detail->introduce=$request->introduce;
            $detail->content=$request->content;
            $detail->user_id = Auth::user()->id;
            $detail->cate_id = $request->category;

            if($detail->save()){
                return response()->json([
                    'add_detail'=>true
                ],200);
            }

        }
    }
    /*Show detail content*/
    public function detail_content(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $content = Detail::find($id);

            return response()->json($content);
        }
    }

    /*Edit detail*/
    public function get_edit_detail(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_detail=Detail::find($id);
            $id_edit = ['id'=>$info_detail->cate_id];

            /*get data category*/
            $category = Category::select('id', 'name', 'parent_id')->get();
            foreach ($category as $parent) {
                $id=$parent->id;
                $cate = Category::where('parent_id',$id)->get();
                $cate_parent = Category::where('parent_id',!$id)->get();
                return response()->json(array(
                    [
                        'info_detail' => $info_detail,
                        'parent'=>$cate_parent,
                        'cate'=>$cate,
                        'category'=>$category,
                        'id_edit'=>$id_edit
                    ]
                ));
            }
            /*End get data category*/
        }
    }

    public function post_edit_detail(Request $request){
        $id=$request->old_id_edit_detail;
            $rules =[
                'edit_tittle' => Rule::unique('details','tittle')->ignore($id)
            ];
            $messages=[
                'edit_tittle.unique' => "Tittle has adready exists."
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return response()->json([
                    'error_edit_detail'=>true,
                    'messages'=>$validator->errors()
                    ],200);
            }else{
            $detail = Detail::find($id);

            /*Request data*/
            $detail->tittle    = $request->edit_tittle;
            $detail->alias     = tittle(($request->edit_tittle));
            $detail->type      =$request->edit_type_article;
            $detail->introduce =$request->edit_introduce;
            $detail->content   =$request->edit_content;
            $detail->cate_id   = $request->edit_category;

            if($detail->save()){
                return response()->json([
                    'edit_detail'=>true
                ],200);
            }else{
                $a=['errors'=>"error saving data"];
                return response()->json($a);
            }

        }
    }

    /*Delete Detail*/
    public function get_delete_detail(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_detail_delete=Detail::find($id);

            if($info_detail_delete->type=="audio"){
                return response()->json([
                    'error_delete_listening'=>true,
                    ]);
            }else{
               return response()->json($info_detail_delete);
            }
        }
    }
    public function post_delete_detail(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $detail_delete=Detail::find($id);

            $detail_delete->delete($id);
        }
    }
}