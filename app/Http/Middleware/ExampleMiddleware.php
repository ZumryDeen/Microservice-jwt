<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMiddleware
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
// return $next($request); is its plac b4 the biz logic url will run even logic is fail
        return $next($request);
        if($request->input('id')<=100){
            return "less than 10000";
        }


    }
}
