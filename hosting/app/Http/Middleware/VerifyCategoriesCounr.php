<?php

namespace App\Http\Middleware;
use App\Category;

use Closure;

class VerifyCategoriesCounr
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
        if (Category::all()->count() == 0) {
            session()->flash('error', 'Create Category First :)');
            return redirect('categories/create');
        }
        return $next($request);
    }
}
