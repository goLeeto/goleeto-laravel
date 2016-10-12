<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Seller
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

        $userType = \Auth::user()->UserType;
        
        if ($userType!=2) {
            return redirect('/');
        }else{
            return $next($request);
        }
    }
}
