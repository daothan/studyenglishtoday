<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Listening;
use App\Category;
use Validator;
use Auth;
use File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;

class ListeningController extends Controller
{
    public function show(){
    	$listening = Listening::orderBy('id','DESC')->get();
    	return view('admin.listening.listening_show', compact('listening'));
    }

    public function view_listening_detail(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $content = Listening::find($id);

            return response()->json($content);
        }
    }
    /*Add Video*/
    public function get_add_listening(){
        $category = Category::where('name',"listening")->get();

        return response()->json($category);


    }
    public function post_add_listening(Request $request){
    	$rules =[
            'tittle_listening' => 'unique:listenings,tittle'
        ];
        $messages=[
            'tittle_listening.unique' => "Tittle has adready exists."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_listening'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{

            $file_name = $request->file('audio_listening')->getClientOriginalName();

            $folder_create = tittle($request->tittle_listening);
            $folder = 'storage/uploads/listenings/' .$folder_create;

            if(!file_exists($folder)){
                File::makeDirectory($folder, 0777, true);
            }
            $request->file('audio_listening')->move($folder,$file_name);

            $detail = new Detail;
            /*Request data*/
            $detail->tittle = $request->tittle_listening;
            $detail->alias = tittle(($request->tittle_listening));
            $detail->type = "audio";
            $detail->introduce=$request->introduce_listening;
            $detail->content="Audio File";
            $detail->user_id = Auth::user()->id;
            $detail->cate_id =$request->cate_listening;

            if($detail->save()){
                $listening = new Listening;
                /*Request data*/
                $listening->tittle     = $request->tittle_listening;
                $listening->introduce  = $request->introduce_listening;
                $listening->audio      = $file_name;
                $listening->audio_path = $folder.'/'.$file_name;
                $listening->transcript = $request->transcript_listening;
                $listening->user_id    = Auth::user()->id;

                $data = [
                    'name'=>Auth::user()->name,
                    'action'=>" added article audio",
                    'tittle'=>$request->input('add_name'),
                    'link'=>route('admin.listening.show')
                ];
                Mail::send('user_interface.notifications.add_detail', $data,function($msg){
                    $msg->from('daothan12111@gmail.com', 'Add Audio Successfull');
                    $msg->to('daothan12111@gmail.com','Quoc Than')->subject('New audio added on studyenglishtoday.org');
                });

                if($listening->save()){
                    return response()->json([
                        'add_listening' =>true,
                        'detail'        => $detail
                    ],200);
                }
            }
        }
    }

    /*Edit detail*/
    public function get_edit_listening(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_audio=Listening::find($id);
            $id_detail = Detail::where('tittle',$info_audio->tittle)->select('id')->get();

            return response()->json(array(['info_audio'=>$info_audio,'id_detail'=>$id_detail]));
        }
    }

    public function post_edit_listening(Request $request){
        $id=$request->old_id_edit_listening;
        $rules =[
            'tittle_listening_edit' => Rule::unique('listenings','tittle')->ignore($id)
        ];
        $messages=[
            'tittle_listening_edit.unique' => "Tittle has adready exists."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_edit_listening'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $listening = Listening::find($id);

            if($request->audio_listening_edit){
                File::deleteDirectory('storage/uploads/listenings/'.tittle($request->tittle));
                $file_name = $request->file('audio_listening_edit')->getClientOriginalName();

                $folder_create = tittle($request->tittle_listening_edit);
                $folder = 'storage/uploads/listenings/' .$folder_create;

                if(!file_exists($folder)){
                    File::makeDirectory($folder, 0777, true);
                }
                $request->file('audio_listening_edit')->move($folder,$file_name);
                $listening->audio      = $file_name;
                $listening->audio_path = $folder.'/'.$file_name;
            }


            /*Request data*/
            $listening->tittle     = $request->tittle_listening_edit;
            $listening->introduce  = $request->introduce_listening_edit;
            $listening->transcript = $request->transcript_listening_edit;

            $detail =Detail::find($request->old_id_edit_detail1);

            if($listening->save()){

                $detail->tittle = $request->tittle_listening_edit;
                $detail->alias = tittle(($request->tittle_listening_edit));
                $detail->introduce=$request->introduce_listening_edit;

                if($detail->save()){
                    return response()->json([
                        'edit_listening' =>true,
                        'detail'        => $detail
                    ],200);
                }
            }else{
                $a=['errors'=>"error saving data"];
                return response()->json($a);
            }

        }
    }

    public function get_delete_listening(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_audio=Listening::find($id);
            $id_detail = Detail::where('tittle',$info_audio->tittle)->select('id')->get();

            return response()->json($id_detail);
        }
    }
    public function post_delete_listening(Request $request){
        $detail_delete=Detail::find($request->id_delete_listening);
        $detail_delete->delete($request->id_delete_listening);
        if($request->ajax()){

            $id=$request->id;
            $listening_delete=Listening::find($id);
            File::deleteDirectory('storage/uploads/listenings/'.tittle($listening_delete->tittle));
            $listening_delete->delete($id);
        }
    }
}
