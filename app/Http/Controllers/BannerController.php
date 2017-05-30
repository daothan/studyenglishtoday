<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Validator;
use Illuminate\Validation\Rule;

class BannerController extends Controller
{
    public function show(){
    	$banner = Banner::orderBy('id','DESC')->get();
    	return view('admin.banner.banner_show', compact('banner'));
    }

    public function view_banner_detail(Request $request){
    	if($request->ajax()){
    		$id = $request->id;
    		$info = Banner::find($id);
    		return response()->json($info);
    	}
    }

    public function post_add_banner(Request $request){
    	$rules =[
            'tittle_banner' => 'unique:banners,tittle'
        ];
        $messages=[
            'tittle_banner.unique' => "Tittle has adready exists."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json([
                'error_add_banner'=>true,
                'messages'=>$validator->errors()
                ],200);
        }else{
            $banner = new Banner;

            /*Request data*/
			$banner->tittle    = $request->tittle_banner;
			$banner->introduce = $request->introduce_banner;
			$banner->content   = $request->content_banner;

            if($banner->save()){
                return response()->json([
                    'add_banner'=>true
                ],200);
            }

        }
    }

    public function get_edit_banner(Request $request){
    	if($request->ajax()){
    		$id = $request->id;
    		$info = Banner::find($id);
    		return response()->json($info);
    	}
    }
    public function post_edit_banner(Request $request){
    	$id = $request->old_id_banner;
    	$rules= [
    		'tittle_banner_edit'=>Rule::unique('banners','tittle')->ignore($id)
    	];
    	$messages=[
    		'tittle_banner_edit.unique' => "Tittle has adready exists."
    	];

    	$validator = Validator::make($request->all(), $rules,$messages);

    	if($validator->fails()){
    		return response()->json([
					'error_edit_banner' =>true,
					'messages'          =>$validator->errors()
    			],200);
    	}else{
    		$banner_edit = Banner::find($id);

			$banner_edit->tittle    = $request->tittle_banner_edit;
			$banner_edit->introduce = $request->introduce_banner_edit;
			$banner_edit->content   = $request->content_banner_edit;

    		if($banner_edit->save()){
    			return response()->json([
    					'edit_banner' =>true
    				],200);
			}
    	}

    }

    public function get_delete_banner(Request $request){
    	if($request->ajax()){
            $id=$request->id;
            $info_banner_delete=Banner::find($id);
            return response()->json($info_banner_delete);
        }
    }
    public function post_delete_banner(Request $request){
    	 if($request->ajax()){
            $id=$request->id;
            $banner_delete=Banner::find($id);

            $banner_delete->delete($id);
        }
    }

}
