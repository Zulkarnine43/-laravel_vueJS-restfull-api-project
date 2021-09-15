<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\MultipleImage;
use DB;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function show_product_form()
    {
        $categories =  Category::all();
        return view('dashboard.product.product_add_form',['categories'=>$categories]);
    }
    public function product_save_info(Request $request)
    {
         $request->validate([
            'product_name'=>'required',
            'category_id'=>'required',
            'product_short_description'=>'required',
            'product_long_description'=>'required',
            'product_price'=>'required|integer',
            'publication_status'=>'required',
        ]);

      $get_last_product_insert_id =  DB::table('products')->insertGetId([
            'product_name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'product_short_description'=>$request->product_short_description,
            'product_long_description'=>$request->product_long_description,
            'product_price'=>$request->product_price,
            'publication_status'=>$request->publication_status,
            'created_at'=>Carbon::now(),
        ]);

        if ($request->hasFile('product_image')) {
        //    print_r( $request->product_image->getClientOriginalExtension());
            $filename = $get_last_product_insert_id.'.'.$request->product_image->getClientOriginalExtension();
            Image::make($request->product_image)->save(base_path('public/uploads/product_images/'.$filename),50);
            DB::table('products')->where('id',$get_last_product_insert_id)->update([
                'product_image'=>$filename,
            ]);
        }

        if ($request->file('product_sub'))
        {
            foreach ($request->file('product_sub') as $image)
            {
                // print_r($image->getClientOriginalName()) ;
                // echo '<br/>';
                $filename = time().$image->getClientOriginalName();
                Image::make($image)->save(base_path('public/uploads/product_images/sub_images/'.$filename),50);
                DB::table('multiple_images')->insert([
                    'product_image'=>$filename,
                    'product_id'=>$get_last_product_insert_id,
                ]);
             }
        }
        return back()->with('product_add_msg','Product Added Successfully');
    }
    public function product_show()
    {
        $Cout_products = Product::all();
        $products = Product::paginate(5);
       $deleted_products = Product::onlyTrashed()->paginate(2);
        return view('dashboard.product.manage_product',['products'=> $products,'deleted_products'=>$deleted_products,'Cout_products'=>$Cout_products]);
    }
    public function unpublished_product_by_id($pro_id)
    {
        DB::table('products')->where(['id'=>$pro_id])->update(['publication_status'=>0]);
        return back()->with('unpublished_msg','Product Unpublished Successfully');
    }
    public function published_product_by_id($pro_id)
    {
        DB::table('products')->where(['id'=>$pro_id])->update(['publication_status'=>1]);
        return back()->with('published_msg','Product Published Successfully');
    }
    public function delete_product_by_id($pro_id)
    {
        Product::find($pro_id)->delete();
        return back()->with('unpublished_msg','Product soft delete Successfully');
    }
    public function restore_product_by_id($pro_id)
    {
        Product::withTrashed()->where('id',$pro_id)->restore();
        return back()->with('published_msg','Product restore Successfully');
    }
    public function forceDelete_product_by_id($pro_id)
    {
        $product = Product::onlyTrashed()->find($pro_id);
        if ($product->product_image == 'default_img.jpg') {
            Product::onlyTrashed()->find($pro_id)->forceDelete();
            return back()->with('unpublished_msg','Product Permanent Delete Successfully');
        }else {
            unlink(base_path('public/uploads/product_images/'.$product->product_image));
            Product::onlyTrashed()->find($pro_id)->forceDelete();
            return back()->with('unpublished_msg','Product Permanent Delete Successfully');
        }


    }

    public function edit_product_by_id($pro_id)
    {
        $categories =  Category::all();
        $product =DB::table('products')->where(['id'=>$pro_id])->first();
        // print_r( $product);
        return view('dashboard.product.edit_product',['product'=> $product,'categories'=>$categories]);
    }
    public function update_product_by_id(Request $request)
    {
        // return $request->all();
        DB::table('products')->where('id',$request->product_id)->update([
            'product_name'=>$request->product_name,
            'category_id'=>$request->category_id,
            'product_short_description'=>$request->product_short_description,
            'product_long_description'=>$request->product_long_description,
            'product_price'=>$request->product_price,
            'publication_status'=>$request->publication_status,
        ]);

        if ($request->hasFile('product_image')) {

            $product =  Product::find($request->product_id);

            if($product->product_image =='default_img.jpg'){

                $filename = $request->product_id.'.'.$request->product_image->getClientOriginalExtension();
                Image::make($request->product_image)->save(base_path('public/uploads/product_images/'.$filename),50);
                DB::table('products')->where('id',$request->product_id)->update([
                    'product_image'=>$filename,
                ]);

            }else {
                unlink(base_path('public/uploads/product_images/'.$product->product_image));
                $filename = $request->product_id.'.'.$request->product_image->getClientOriginalExtension();
                Image::make($request->product_image)->save(base_path('public/uploads/product_images/'.$filename),50);
                DB::table('products')->where('id',$request->product_id)->update([
                    'product_image'=>$filename,
                ]);

            }


        }
         return back()->with('product_add_msg','Product Update Successfully');
    }

}
