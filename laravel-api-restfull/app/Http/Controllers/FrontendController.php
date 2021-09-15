<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\MultipleImage;

class FrontendController extends Controller
{
   function index()
   {
        // $categories = Category::all();
        $LatestProducts =  Product::where('publication_status',1)->orderBy('id', 'DESC')->take(8)->get();
        $products =  Product::where('publication_status',1)->get();
        return view('front-end/frontend_view',compact('LatestProducts','products'));
   }
   function product_details_by_id($product_id)
   {
        $product =  Product::find($product_id);
       $slider_images =  MultipleImage::where('product_id',$product->id)->get();

        $relatedProducts =  Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->orderBy('id','DESC')->get();
        return view('front-end/product_details',['product'=>$product,'relatedProducts'=>$relatedProducts,'slider_images'=>$slider_images]);
   }
   public function shop_page_view()
   {
        // $categories = Category::all();
        $products =  Product::where('publication_status',1)->orderBy('id','DESC')->paginate(12);
       return view('front-end/shop_page',compact('products'));
   }
   public function product_view_by_cat_id($category_id)
   {
        // $categories = Category::all();
        $productsByCategory =  Product::where('category_id',$category_id)->orderBy('id','DESC')->paginate(12);
       return view('front-end/shop_page',['products'=>$productsByCategory]);
   }

}
