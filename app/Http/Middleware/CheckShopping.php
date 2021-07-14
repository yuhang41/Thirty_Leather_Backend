<?php

namespace App\Http\Middleware;

use Closure;

class CheckShopping
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
        if(\Cart::isEmpty()){
            return redirect('/front/product')->with('message','請選擇商品');
        }
        return $next($request);
    }
}
