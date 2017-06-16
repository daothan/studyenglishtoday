<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Contact;
use App\Checkword;

class CheckwordController extends Controller
{
    public function checkword(Request $request){

    	$checkword = Checkword::orderBy('id','DESC')->get();

    	$banner            = Banner::select('id','tittle','introduce','content')->get();

        $contact           = Contact::where('prior',1)->get();
        $max_id_contact    = Contact::max('id');
        $last_contact      = Contact::where('id',$max_id_contact)->get();
    	return view('user_interface.check_word.checkword', compact('banner','contact','last_contact','checkword'));
    }
}
