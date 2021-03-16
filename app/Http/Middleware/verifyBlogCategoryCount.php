<?php

namespace App\Http\Middleware;

use Closure;
use App\BlogCategory;

class verifyBlogCategoryCount
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
        if(BlogCategory::all()->count()==0){
            session()->flash('error','You need to add post cetegories to be able to create post');
            return redirect(route('blogcategories.create'));
        }
        return $next($request);
    }
}
