<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Textfile;
use Validator;
use Illuminate\Support\Facades\Mail;

class TextfileController extends Controller
{
    public function show(){
    	$info = Textfile::orderBy('id','DESC')->get();
    	return view('admin.text_file.text_file_show', compact('info'));
    }

    public function detail(Request $request){
    	if($request->ajax()){
    		$info_id = $request->id;
    		$info = Textfile::find($info_id);
    		return response()->json($info);
    	}
    }

    public function post_add_file(Request $request){
    	$rules=[
    		'tittle_file'=>'required'
    	];
    	$messages=[
    		'tittle_file.required'=>"Please enter tittle"
    	];

    	$validator= Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()){
    		return response()->json([
    				'error_add_file'=>true,
    				'messages'=>$validator->errors()
    			],200);
    	}else{
    		$file_text = new Textfile;

    		$file_text->tittle=$request->tittle_file;
    		$file_text->content=$request->content_file;

    		if($file_text->save()){
    			$data = [
                    'action'=>" added file successful",
                    'tittle'=>$request->input('tittle_file'),
                    'link'=>route('admin.text_file.show')
                ];
                Mail::send('user_interface.notifications.add_detail', $data,function($msg){
                    $msg->from('daothan12111@gmail.com', 'Add Audio Successfull');
                    $msg->to('daothan12111@gmail.com','Quoc Than')->subject('New text file added on studyenglishtoday.org');
                });

    			return response()->json([
    				'success_add_file'=>true,
    				'data'=>$file_text
				],200);
    		};
    	}
    }

     /*Edit detail*/
    public function get_edit_file(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_file=Textfile::find($id);

            return response()->json($info_file);
        }
    }
    public function post_edit_file(Request $request){
    	$id=$request->old_id_file;
    	$rules=[
    		'tittle_file_edit'=>'required'
    	];
    	$messages=[
    		'tittle_file_edit.required'=>"Please enter tittle"
    	];

    	$validator= Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()){
    		return response()->json([
    				'error_edit_file'=>true,
    				'messages'=>$validator->errors()
    			],200);
    	}else{
    		$file_text_edit = Textfile::find($id);

    		$file_text_edit->tittle=$request->tittle_file_edit;
    		$file_text_edit->content=$request->content_file_edit;

    		if($file_text_edit->save()){
    			return response()->json([
    				'success_edit_file'=>true,
    				'data'=>$file_text_edit
				],200);
    		};
    	}
    }

    public function post_delete_file(Request $request){
        $file_delete_id=$request->id_delete_file;

        $detail_delete=Textfile::find($file_delete_id);
        $detail_delete->delete($file_delete_id);
    }
}

