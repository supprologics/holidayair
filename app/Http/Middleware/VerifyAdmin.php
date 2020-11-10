<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class VerifyAdmin
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
        if(!auth()->user()->isAdmin()){
            session()->flash('error','You have no permission to access user management.');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
