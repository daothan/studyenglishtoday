<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
	/*Show details*/
	public function show(){
		return view('admin.detail.show');
	}

    public function getAdd(){
    	return view('admin.detail.add');
    }

    public function postAdd(){

    }
}
