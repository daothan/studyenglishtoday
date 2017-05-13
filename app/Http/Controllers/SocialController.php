<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use App\Social;

class SocialController extends Controller
{

	public function __construct()
	    {
	        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
	    }

	/*Login by Facebook*/
    public function facebookredirect()
    {
        return Socialite::driver('facebook')->setScopes(['email'])->redirect();
    }

    public function facebookcallback(Request $request)
    {

        $user_social = Socialite::driver('facebook')->stateless()->user();

        if($user_social->email){
        	$facebook = Social::where('provider_user_id', $user_social->id)->where('provider','facebook')->first();
	        if($facebook){ /*If has user the login*/
	        	$user_facebook = User::where('email', $user_social->email)->first();
	        	Auth::login($user_facebook);
	        	return redirect()->route('user.home');
	        }else{/*If user is not exists in table socials, then create*/

	        	$new_user_facebook = new Social;
				$new_user_facebook->provider_user_id = $user_social->id;
				$new_user_facebook->provider         ='facebook';
				$new_user_facebook->user_id=$user_social->id;
				$new_user_facebook->save();

				$user = User::where('email', $user_social->email)->first();
				if(!$user){/*If user is not exists in table users, then create*/
					$user = User::create([
						'name'  => $user_social->name,
						'email' => $user_social->email,
						'level' => 2
						]);
				}

				Auth::login($user);

				return redirect()->route('user.home');
       		}
        }else{
        	$request->session()->flash('alert-danger', 'You cannot login by this Facebook account !');
        	return redirect()->route('user.home');
        }
    }

    /*Login by Google*/
    public function googleredirect()
    {
        return Socialite::driver('google')->setScopes(['email'])->redirect();
    }

    public function googlecallback(Request $request)
    {

        $user_social = Socialite::driver('google')->stateless()->user();
dd($user_social);die;
        if($user_social->email){
        	$google = Social::where('provider_user_id', $user_social->id)->where('provider','google')->first();
	        if($google){ /*If has user the login*/
	        	$user_google = User::where('email', $user_social->email)->first();
	        	Auth::login($user_google);
	        	return redirect()->route('user.home');
	        }else{/*If user is not exists in table socials, then create*/

	        	$new_user_google = new Social;
				$new_user_google->provider_user_id = $user_social->id;
				$new_user_google->provider         ='google';
				$new_user_google->user_id=$user_social->id;
				$new_user_google->save();

				$user = User::where('email', $user_social->email)->first();
				if(!$user){/*If user is not exists in table users, then create*/
					$user = User::create([
						'name'  => $user_social->name,
						'email' => $user_social->email,
						'level' => 2
						]);
				}

				Auth::login($user);

				return redirect()->route('user.home');
       		}
        }else{
        	$request->session()->flash('alert-danger', 'You cannot login by this Google account !');
        	return redirect()->route('user.home');
        }
    }
}
