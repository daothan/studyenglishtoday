<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
use Validator;

class CommentController extends Controller
{
    public function show(){
    	$comment = Comment::orderBy('id','DESC')->get();
    	return view('admin.comment.comment_show', compact('comment'));
    }

    public function view_comment_detail(Request $request){
    	if($request->ajax()){
    		$id=$request->id;
    		$comment_info = Comment::find($id);
    		return response()->json($comment_info);
    	}
    }

    /*Delete Comment*/
    public function get_delete_comment(Request $request){
        if($request->ajax()){
            $id=$request->id;
            $info_comment_delete=Comment::find($id);
            return response()->json($info_comment_delete);
        }
    }
    public function post_delete_comment(Request $request){
    	if($request->ajax()){
            $id=$request->id;
            $comment_delete=Comment::find($id);

            $comment_delete->delete($id);
        }
    }

    /*Comment*/
    public function comment(Request $request, $acticle_id, $acticle_tittle, $article_type){
        $rules = [
            'comment_form' => 'required'
        ];
        $message = [
            'comment_form.required'=>"Please enter your comment"
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if($validator->fails()){
            return redirect()->back()->with('error',"Please enter your comment");
        }
        else{
            $comment = new Comment;

            $comment->article_id=$acticle_id;
            $comment->article_name=$acticle_tittle;
            $comment->article_type=$article_type;
            $comment->user_comment=Auth::user()->name;
            $comment->comment=$request->comment_form;

            if($comment->save()){
                return redirect()->back()->with('success',"Your idea sent successfully");
            }
        }
    }
}
