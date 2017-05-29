<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Detail;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

	public function index(){
		return view('welcome');
	}

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
    public function error_404(){
        return view('user_interface.layouts.user_404');
    }
    /*Show details*/
    public function user_home(){
        $detail            = Detail::orderBy('id','DESC')->get();

        $max_id            = Detail::max('id');
        $last_post         = Detail::find($max_id);

        $listening_article = Detail::where('type','listening')->get();
        $reading_article   = Detail::where('type','reading')->get();
        $writing_article   = Detail::where('type','writing')->get();

        return view('user_interface.user_home', compact('detail','max_id','last_post','listening_article', 'reading_article', 'writing_article'));
    }
    /*New post Page*/
    public function new_post(){
        $new_post = Detail::orderBy('id','DESC')->paginate(6);
        return view('user_interface.article_detail.new_post', compact('new_post'));
    }

    /*Listening Page*/
    public function listening(){
        $listening = Detail::where('type','listening')->orderBy('id','DESC')->paginate(6);
        return view('user_interface.article_detail.listening_page',compact('listening'));
    }
    /*Reading Page*/
    public function reading(){
        $reading = Detail::where('type','reading')->orderBy('id','DESC')->paginate(6);
        return view('user_interface.article_detail.reading_page', compact('reading'));
    }
    /*Writing Page*/
    public function writing(){
        $writing = Detail::where('type','writing')->orderBy('id','DESC')->paginate(6);
        return view('user_interface.article_detail.writing_page',compact('writing'));
    }

    /*Contact*/
    public function contact(Request $request){
        $data = [
            'name'=>$request->input('name_contact'),
            'email'=>$request->input('email_contact'),
            'messages'=>$request->input('message_contact')
        ];
        Mail::send('user_interface.layouts.content_contact', $data,function($msg){
            $msg->to('daothan12111@gmail.com','Quoc Than')->subject('Here is first email');
        });
    }

}
