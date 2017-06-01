<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listening;
use Validator;
use Auth;
use File;
use Illuminate\Validation\Rule;

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

            $detail = new Listening;

            /*Request data*/
            $detail->tittle     = $request->tittle_listening;
            $detail->introduce  = $request->introduce_listening;
            $detail->audio      = $file_name;
            $detail->audio_path = $folder.'/'.$file_name;
            $detail->transcript = $request->transcript_listening;
            $detail->user_id    = Auth::user()->id;

            if($detail->save()){
                return response()->json([
                    'add_listening' =>true,
                    'detail'        => $detail
                ],200);
            }

        }
    }

    /*Edit detail*/
    public function get_edit_listening(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_audio=Listening::find($id);

            return response()->json($info_audio);
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
            $detail = Listening::find($id);

            if($request->audio_listening_edit){
                File::deleteDirectory('storage/uploads/listenings/'.tittle($request->tittle));
                $file_name = $request->file('audio_listening_edit')->getClientOriginalName();

                $folder_create = tittle($request->tittle_listening_edit);
                $folder = 'storage/uploads/listenings/' .$folder_create;

                if(!file_exists($folder)){
                    File::makeDirectory($folder, 0777, true);
                }
                $request->file('audio_listening_edit')->move($folder,$file_name);
                $detail->audio      = $file_name;
                $detail->audio_path = $folder.'/'.$file_name;
            }


            /*Request data*/
            $detail->tittle     = $request->tittle_listening_edit;
            $detail->introduce  = $request->introduce_listening_edit;
            $detail->transcript = $request->transcript_listening_edit;

            if($detail->save()){
                return response()->json([
                    'edit_listening'=>true
                ],200);
            }else{
                $a=['errors'=>"error saving data"];
                return response()->json($a);
            }

        }
    }

    public function post_delete_listening(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $listening_delete=Listening::find($id);
            File::deleteDirectory('storage/uploads/listenings/'.tittle($listening_delete->tittle));
            $listening_delete->delete($id);
        }
    }
}
