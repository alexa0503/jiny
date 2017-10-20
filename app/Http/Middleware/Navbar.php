<?php

namespace App\Http\Middleware;

use Closure;

class Navbar
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
        if( !$request->has('categories') ){
            $categories = \App\Category::orderBy('sort_id', 'ASC')->get();
            $request->session()->put('categories', $categories);
        }
        return $next($request);
    }
}
