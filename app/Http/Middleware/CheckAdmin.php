<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user_level = Auth::user()->level;

            if($user_level < 2){/*Member*/
                return $next($request);
            }return redirect()->route('member.home');
        }
        return redirect()->route('account.getLogin');
    }
}
