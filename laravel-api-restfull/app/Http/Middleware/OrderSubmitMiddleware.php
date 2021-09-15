<?php

namespace App\Http\Middleware;

use Closure;
use Cart;
class OrderSubmitMiddleware
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
        // if (Cart::getTotalQuantity()) {
        //     return $next($request);
        // }else {
        //     return redirect('/shop/page')->with('cart_item_null_msg','Please Add a item in Cart');
        // }
    }
}
