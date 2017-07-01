<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use App\Social;
use Session;

class SocialController extends Controller
{

	public function __construct()
	    {
	        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
	    }


	/*Login by Facebook*/
    public function facebookredirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookcallback(Request $request)
    {

        $user_social = Socialite::driver('facebook')->stateless()->user();
        $email_social = $user_social->email.'.'.$user_social->id;

    	$facebook = Social::where('provider_user_id', $user_social->id)->where('provider','facebook')->first();
        if($facebook){ /*If has user the login*/
        	$user_facebook = User::where('email_social', $email_social)->first();
        	Auth::login($user_facebook);
        	return redirect()->route('home');
        }else{/*If user is not exists in table socials, then create*/

        	$new_user_facebook = new Social;
			$new_user_facebook->provider_user_id = $user_social->id;
			$new_user_facebook->provider         = 'facebook';

			$user = User::where('email_social', $email_social)->first();
			if(!$user){/*If user is not exists in table users, then create*/
				$user = User::create([
					'name'  => $user_social->id,
					'name_social'  => $user_social->name,
					'email' => $user_social->id,
					'email_social' => $email_social,
					'level' => 2
					]);
			}
			/*create socials*/
			$new_user_facebook->user_id = $user->id;
			$new_user_facebook->save();

			if(Auth::login($user))
			return redirect()->route('home');
   		}
    }

    /*Login by Google*/
    public function googleredirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)
    {

        $user_social = Socialite::driver('google')->stateless()->user();
        $email_social = $user_social->email.'.'.$user_social->id;

    	$google = Social::where('provider_user_id', $user_social->id)->where('provider','google')->first();

        if($google){ /*If has user the login*/
        	$user_google = User::where('email_social', $email_social)->first();
        	Auth::login($user_google);
        	return redirect()->route('home');

        }else{/*If user is not exists in table socials, then create*/

			$new_user_google = new Social;
			$new_user_google->provider_user_id = $user_social->id;
			$new_user_google->provider         = 'google';

			$user = User::where('email_social', $email_social)->first();
			if(!$user){/*If user is not exists in table users, then create*/
				$user = User::create([
					'name'  => $user_social->id,
					'name_social'  => $user_social->name,
					'email' => $user_social->id,
					'email_social' => $email_social,
					'level' => 2
					]);
			}
			/*create socials*/
			$new_user_google->user_id          = $user->id;
			$new_user_google->save();

			Auth::login($user);
			return redirect()->route('home');
   		}
 	}
}
