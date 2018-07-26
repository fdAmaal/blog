<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        if ( Auth::check() && Auth::user()->is_admin == false )
        {
            return $next($request);
        }

        return redirect('/admin');
    }
}
//i think its ok now
// Thank you sooo much !!!!!!!!
//though in future, try use multiple guards for auth,
//like say admin guard separate from auth guard, i have an article on this, i'll share the link right way.
// i will, thanks a lot !
//cheers, i;ll disconnect now