<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Requests\LoginRequest;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin(){
        return view('admin.login.login');
    }
    public function postLogin(LoginRequest $request){
        $login = array(
            'name'     => $request->input('name'),
            'password' =>$request->input('password')
            );
        if(Auth::attempt($login)){
            return redirect()->route('admin.cate.show');
        }else{
            return redirect()->route('getLogin')->with(['flash_level'=>'danger', 'flash_message'=>'Username or Password wrong.'])->withInput();
        }
    }
}
