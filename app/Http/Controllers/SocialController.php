<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use App\Social;

class SocialController extends Controller
{

    public function facebookredirect()
    {
        return Socialite::driver('facebook')
            ->scopes(['email'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function facebookcallback()
    {
        $user_social = Socialite::driver('facebook')->user();

        $facebook = Social::where('provider_user_id', $user_social->id)->where('provider','facebook')->first();
        if($facebook){
        	$user_facebook = User::where('email', $user_social->email)->first();
        	Auth::login($user_facebook);
        	return redirect()->route('user.home');
        }else{
        	$new_user_facebook = new Social;

			$new_user_facebook->provider_user_id = $user_social->id;
			$new_user_facebook->provider         ='facebook';

			$user = User::where('email', $user_social->email)->first();
			if(!$user){
				$user = User::create([
					'name'=>$user_social->name,
					'email'=>$user_social->email,
					'level'=>2
					]);
			}
			$new_user_facebook->user_id=$user_social->id;
			$new_user_facebook->save();

			Auth::login($user);

			return redirect()->route('user.home');
        }
    }
}
