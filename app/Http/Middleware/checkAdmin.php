<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkAdmin
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

if(Auth::user()==null){
    return redirect('/');
}
else{
    if (Auth::user()->role == 'Administrador') {
        return $next($request);
    }  
}


     

        return redirect('/'); // If user is not an admin.

    }
}
