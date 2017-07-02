<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Detail;
use App\Banner;
use App\Contact;
use App\Listening;
use App\Comment;
use App\Guide;
use Auth;
use Validator;
use Session;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

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

    /*Search*/
    public function search(Request $request){
        $results        = Detail::where('tittle','like','%'.$request->get('search').'%')->orderBy('id', 'DESC')->paginate(7);
        $banner         = Banner::select('id','tittle','introduce','content')->get();
        $results_count  = Detail::where('tittle','like','%'.$request->get('search').'%')->count();
        $total_post     = Detail::count();
        $contact        = Contact::where('prior',1)->get();
        $max_id_contact = Contact::max('id');
        $last_contact   = Contact::where('id',$max_id_contact)->get();
        $guide_count    = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        return view('user_interface.article_detail.result_search',compact('results','banner','contact','last_contact','results_count','total_post','guide_count','guide_en', 'guide_vi'));
    }
    /*Show details*/
    public function user_home(Request $request){
        $newest_post       = Detail::orderBy('id', 'DESC')->get();
        $last_post         = Detail::max('id');

        $audio             = Listening::orderBy('id','DESC')->paginate(9);
        $listening_article = Detail::where('type','listening')->orderBy('id','DESC')->get();
        $reading_article   = Detail::where('type','reading')->orderBy('id','DESC')->get();
        $library_article   = Detail::where('type','library')->orderBy('id','DESC')->get();

        $banner            = Banner::select('id','tittle','introduce','content')->get();

        $contact           = Contact::where('prior',1)->get();
        $max_id_contact    = Contact::max('id');
        $last_contact      = Contact::where('id',$max_id_contact)->get();
        $guide_count       = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            if($request->search != " "){
                return redirect()->route('search',['search='.$request->get('search')]);
            }else{
                 Session::flash('error_search', 'No results found');
            }
        }
        /*EndSearch*/

        return view('user_interface.article_detail.user_home', compact('newest_post','listening_article', 'audio','reading_article', 'library_article','banner','contact','last_contact','last_post','guide_count','guide_en', 'guide_vi'));
    }
    /*New post Page*/
    public function new_post(Request $request){
        $new_post = Detail::orderBy('id','DESC')->paginate(7);
        $last_post         = Detail::max('id');
        $banner            = Banner::select('id','tittle','introduce','content')->get();

        $contact           = Contact::where('prior',1)->get();
        $max_id_contact    = Contact::max('id');
        $last_contact      = Contact::where('id',$max_id_contact)->get();
        $guide_count       = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/
        return view('user_interface.article_detail.new_post', compact('new_post','banner','contact','last_contact','guide_count','guide_en', 'guide_vi','last_post'));
    }
    /*Library Page*/
    public function library(Request $request){
        $library           = Detail::where('type','library')->orderBy('id','DESC')->paginate(7);
        $last_post         = Detail::where('type','library')->max('id');
        $banner            = Banner::select('id','tittle','introduce','content')->get();

        $contact           = Contact::where('prior',1)->get();
        $max_id_contact    = Contact::max('id');
        $last_contact      = Contact::where('id',$max_id_contact)->get();
        $guide_count       = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/
        return view('user_interface.article_detail.library_page',compact('library','banner','contact','last_contact','guide_count','guide_en', 'guide_vi','last_post'));
    }

    /*Listening Page*/
    public function listening(Request $request){
        $listening      = Detail::where('type','listening')->orderBy('id','DESC')->paginate(7);
        $last_post      = Detail::where('type','listening')->max('id');
        $banner         = Banner::select('id','tittle','introduce','content')->get();

        $contact        = Contact::where('prior',1)->get();
        $max_id_contact = Contact::max('id');
        $last_contact   = Contact::where('id',$max_id_contact)->get();
        $guide_count    = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/
        return view('user_interface.article_detail.listening_page',compact('listening','banner','contact','last_contact','guide_count','guide_en', 'guide_vi','last_post'));
    }
    /*Listening Page*/
    public function practice_listening(Request $request){
        $audio          = Listening::orderBy('id','DESC')->paginate(7);
        $last_post      = Listening::max('id');
        $banner         = Banner::select('id','tittle','introduce','content')->get();
        $contact        = Contact::where('prior',1)->get();
        $max_id_contact = Contact::max('id');
        $last_contact   = Contact::where('id',$max_id_contact)->get();
        $guide_count    = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/
        return view('user_interface.article_detail.audio_page',compact('audio','banner','contact','last_contact','guide_count','guide_en', 'guide_vi','last_post'));
    }
    /*Reading Page*/
    public function reading(Request $request){
        $reading = Detail::where('type','reading')->orderBy('id','DESC')->paginate(7);
        $banner            = Banner::select('id','tittle','introduce','content')->get();

        $contact           = Contact::where('prior',1)->get();
        $max_id_contact    = Contact::max('id');
        $last_contact      = Contact::where('id',$max_id_contact)->get();
        $guide_count       = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();
        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/
        return view('user_interface.article_detail.reading_page', compact('reading','banner','contact','last_contact'));
    }

    /*Show detail article*/
    public function detail_article(Request $request,$type,$tittle){
        $relate_article = Detail::where('type',$type)->where('alias','!=',$tittle)->orderBy('id','DESC')->get();

        $detail_article = Detail::where('alias',$tittle)->get();
        foreach($detail_article as $id_article){
            $article_id = $id_article->id;
        }
        $comment_info   = Comment::where('article_type','listening')->orWhere('article_type','reading')->orWhere('article_type','library')->where('article_id',$article_id)->orderBy('id','DESC')->paginate(10);
        $comment_count  = Comment::where('article_type','listening')->orWhere('article_type','reading')->orWhere('article_type','library')->where('article_id',$article_id)->count();

        $banner         = Banner::select('id','tittle','introduce','content')->get();
        $contact        = Contact::where('prior',1)->get();
        $max_id_contact = Contact::max('id');
        $last_contact   = Contact::where('id',$max_id_contact)->get();
        $guide_count    = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/

        return view('user_interface.article_detail.article_content', compact('detail_article','relate_article','banner','contact','last_contact','comment_info','comment_count','guide_count','guide_en', 'guide_vi'));
    }

     /*Show detail article*/
    public function tittle_audio(Request $request,$tittle_audio){
        $relate_audio = Listening::where('tittle','!=',convert_tittle($tittle_audio))->orderBy('id','DESC')->get();

        $detail_audio = Listening::where('tittle',convert_tittle($tittle_audio))->get();
        $detail_article = Detail::where('alias',$tittle_audio)->get();
        foreach($detail_article as $id_audio){
            $audio_id = $id_audio->id;
        }

        $comment_info   = Comment::where('article_type','audio')->where('article_id',$audio_id)->orderBy('id','DESC')->paginate(10);
        $comment_count  = Comment::where('article_type','audio')->where('article_id',$audio_id)->count();

        $banner         = Banner::select('id','tittle','introduce','content')->get();
        $contact        = Contact::where('prior',1)->get();
        $max_id_contact = Contact::max('id');
        $last_contact   = Contact::where('id',$max_id_contact)->get();
        $guide_count    = Guide::count();
        $guide_vi = Guide::where('tittle','like','%'.'('.'vi'.')'.'%')->get();
        $guide_en = Guide::where('tittle','like','%'.'('.'en'.')'.'%')->get();

        /*Search*/
        if($request->has('search')){
            return redirect()->route('search',['search='.$request->get('search')]);
        }
        /*EndSearch*/

        return view('user_interface.article_detail.audio_content', compact('detail_audio','relate_audio','banner','contact','last_contact','comment_info','comment_count','guide_count','guide_en', 'guide_vi'));
    }

    /*Contact*/
    public function contact(Request $request){
        $data = [
            'name'=>$request->input('name_contact'),
            'email'=>$request->input('email_contact'),
            'messages'=>$request->input('message_contact')
        ];
        Mail::send('user_interface.layouts.content_contact', $data,function($msg){
            $msg->from('daothan12111@gmail.com', 'Studyingenglishtoday');
            $msg->to('daothan1211@gmail.com','Quoc Than')->subject('Response from studyenglish.org');
        });
    }

}
