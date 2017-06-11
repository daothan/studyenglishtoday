<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DetailRequest;
use App\Detail;
use App\Category;
use App\Listening;
use Validator;
use Auth;
use File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class DetailController extends Controller
{

	/*Show details*/
	public function show(){
        $detail = Detail::where('type','!=',"audio")->orderBy('id','DESC')->get();
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

            /*Add Image*/
            $file_detail_image = $request->file('image_detail')->getClientOriginalName();
            //dd($file_detail_image);die;
            $folder_create_img = tittle($request->tittle);
            $folder_img = 'storage/uploads/images/' .$folder_create_img;

            if(!file_exists($folder_img)){
                File::makeDirectory($folder_img, 0777, true);
            }
            $request->file('image_detail')->move($folder_img,$file_detail_image);

            $detail = new Detail;

            /*Request data*/
            $detail->tittle     = $request->tittle;
            $detail->alias      = tittle(($request->tittle));
            $detail->type       = $request->type_article;
            $detail->introduce  = $request->introduce;
            $detail->image      = $file_detail_image;
            $detail->image_path = $folder_img.'/'.$file_detail_image;;
            $detail->content    = $request->content;
            $detail->user_id    = Auth::user()->id;
            $detail->cate_id    = $request->category;

            $data = [
                'name'=>Auth::user()->name." added article",
                'action'=>" added article",
                'tittle'=>$request->tittle,
                'link'=>route('admin.detail.show')
            ];
            Mail::send('user_interface.notifications.add_detail', $data,function($msg){
                $msg->from('daothan12111@gmail.com', 'Add Article Successfull From Studyenglishtoday');
                $msg->to('daothan12111@gmail.com','Quoc Than')->subject('Add Article on studyenglishtoday.org');
            });

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
            /*Edit Image*/
            if($request->image_detail_edit){
                File::deleteDirectory('storage/uploads/images/'.tittle($detail->tittle));
                $file_name_image = $request->file('image_detail_edit')->getClientOriginalName();

                $folder_create_image = tittle($request->edit_tittle);
                $folder_image = 'storage/uploads/images/' .$folder_create_image;

                if(!file_exists($folder_image)){
                    File::makeDirectory($folder_image, 0777, true);
                }
                $request->file('image_detail_edit')->move($folder_image,$file_name_image);

                $detail->image      = $file_name_image;
                $detail->image_path = $folder_image.'/'.$file_name_image;
            }else{
                $folder_create_image = tittle($request->edit_tittle);
                $folder_image = 'storage/uploads/images/' .$folder_create_image;
                if(!file_exists($folder_image)){
                    File::makeDirectory($folder_image, 0777, true);
                }
                File::move('storage/uploads/images/'.tittle($detail->tittle).'/'.($detail->image), $folder_image.'/'.($detail->edit_tittle).'/'.($detail->image));
                File::deleteDirectory('storage/uploads/images/'.tittle($detail->tittle));

                $detail->image      = $detail->image;
                $detail->image_path =  $folder_image.'/'.$detail->image;
            }

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
            File::deleteDirectory('storage/uploads/images/'.tittle($detail_delete->tittle));
            $detail_delete->delete($id);
        }
    }
}