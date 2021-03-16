<?php

namespace App\Http\Middleware;

use Closure;
use App\HotelCategory;

class verifyHotelCategoryCount
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
        if(HotelCategory::all()->count()==0){
            session()->flash('error','You need to add hotel cetegories to be able to create hotel');
            return redirect(route('hotelcategories.create'));
        }
        return $next($request);
    }
}
