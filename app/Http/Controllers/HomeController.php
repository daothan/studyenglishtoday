<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\MessageBag;

class HomeController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function user_interface(){
        return view('user_interface.user_home');
    }

}
