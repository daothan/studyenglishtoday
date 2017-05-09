<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function home_member()
    {
        return view('member.home_member');
    }

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
}
