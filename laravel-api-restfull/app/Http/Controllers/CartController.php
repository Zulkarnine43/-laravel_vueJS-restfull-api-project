<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;


class CartController extends Controller
{
    public function add_to_cart_data(Request $request)
    {
        // return $request->all();
        $product = Product::find($request->product_id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' =>$product->product_price,
            'quantity' =>$request->product_quantity,
            'attributes' =>[
                    'product_image'=>$product->product_image,
                ]
            ]);

         return redirect()->route('product_by_cat',['id'=>$product->category_id]);
    }
    public function cart_remove_item_pro_id($product_id)
    {
        Cart::remove($product_id);
        return back();
    }
    public function cart_update_item_pro_id(Request $request)
    {

        Cart::update($request->product_id, array(

            'quantity' => array(
                    'relative' => false,
                    'value' => $request->product_quantity,
                ),
        ));
        return back();
    }
}
