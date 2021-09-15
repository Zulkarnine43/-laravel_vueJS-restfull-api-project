<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Session;

class AuthCheckedMiddleware
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
        if (Session::get('customer_id')) {
            return redirect('/checkout/shipping');
        }
        return $next($request);
    }
}
