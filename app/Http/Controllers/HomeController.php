<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Detail;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;

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
        return view('user_interface.article_detail.new_post');
    }

    /*Listening Page*/
    public function listening(){
        return view('user_interface.article_detail.listening_page');
    }
    /*Reading Page*/
    public function reading(){
        return view('user_interface.article_detail.reading_page');
    }
    /*Writing Page*/
    public function writing(){
        return view('user_interface.article_detail.writing_page');
    }

}
