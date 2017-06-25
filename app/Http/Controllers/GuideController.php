<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use Validator;
use Illuminate\Validation\Rule;

class GuideController extends Controller
{
    function show(){
    	$guide = Guide::orderBy('id','DESC')->get();
    	return view('admin.guide.guide_show', compact('guide'));

    }

    function view_guide_detail(Request $request){
    	if($request->ajax()){
    		$id = $request->id;
    		$info = Guide::find($id);
    		return response()->json($info);
    	}

    }

    function post_add_guide(Request $request){
    	$rules =[
            'tittle_guide' => 'unique:guides,tittle'
        ];
        $messages=[
            'tittle_guide.unique' => "Tittle has adready exists."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_guide'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $guide = new guide;

            /*Request data*/
			$guide->tittle    = $request->tittle_guide;
			$guide->content   = $request->content_guide;

            if($guide->save()){
                return response()->json([
                    'add_guide'=>true
                ],200);
            }

        }

    }

    function get_edit_guide(Request $request){
    	if($request->ajax()){
    		$id = $request->id;
    		$info = Guide::find($id);
    		return response()->json($info);
    	}

    }

    function post_edit_guide(Request $request){
    	$id = $request->old_id_guide;
    	$rules= [
    		'tittle_guide_edit'=>Rule::unique('guides','tittle')->ignore($id)
    	];
    	$messages=[
    		'tittle_guide_edit.unique' => "Tittle has adready exists."
    	];

    	$validator = Validator::make($request->all(), $rules,$messages);

    	if($validator->fails()){
    		return response()->json([
					'error_edit_guide' =>true,
					'messages'          =>$validator->errors()
    			],200);
    	}else{
    		$guide_edit = Guide::find($id);

			$guide_edit->tittle    = $request->tittle_guide_edit;
			$guide_edit->content   = $request->content_guide_edit;

    		if($guide_edit->save()){
    			return response()->json([
    					'edit_guide' =>true
    				],200);
			}
    	}

    }

    function get_delete_guide(Request $request){
    	if($request->ajax()){
            $id=$request->id;
            $info_banner_delete=Guide::find($id);
            return response()->json($info_banner_delete);
        }

    }

    function post_delete_guide(Request $request){
    	if($request->ajax()){
            $id=$request->id;
            $banner_delete=Guide::find($id);

            $banner_delete->delete($id);
        }

    }
}
