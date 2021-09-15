<?php

namespace App\Http\Middleware\Frontend;

use Closure;
use Cart;
class CartValueCheckMiddleware
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
        if (!Cart::getTotalQuantity()) {
            return redirect('/shop/page')->with('cart_item_null_msg','Please Add a item in The Cart');
        }
        return $next($request);
    }
}
