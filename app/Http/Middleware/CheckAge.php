<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        if($request->age and $request->age < 20){
            echo "siz bu saytga kira olmaysiz";
            abort(403);
        } else{
            redirect()->route('welcome');
        }
//        return $next($request);
    }
}
