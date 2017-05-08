<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Detail::where('id',2)->get();
        return view('admin.detail.content', compact('content'));
    }
}
