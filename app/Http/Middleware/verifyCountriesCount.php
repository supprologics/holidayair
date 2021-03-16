<?php

namespace App\Http\Middleware;

use Closure;
use App\Country;

class verifyCountriesCount
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
        if(Country::all()->count()==0){
            session()->flash('error','You need to add countries to be able to create tour');
            return redirect(route('countries.create'));
        }
        return $next($request);
    }
}
