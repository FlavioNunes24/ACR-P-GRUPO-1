<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Closure;

class Admin
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
        	/*if (!$request->user() || $request->user()->	tipo_utilizador != '2' )
        	{
            	return redirect('/');
        	} */
		
			if($request->user()->tipo_utilizador != '2')
			{
				return redirect('/');
			}
			

        return $next($request);
    }
}
