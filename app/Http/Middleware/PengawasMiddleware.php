<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class PengawasMiddleware
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
         if(Auth::user()->role == "Pengawas"){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
