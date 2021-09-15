<?php

//-----------------Frontend Route--------------

Route::get('/','FrontendController@index');
Route::get('/product/details/{id}',[
     'uses' => 'FrontendController@product_details_by_id',
     'as'   =>'product_details'
 ]);
 Route::get('/shop/page',[
     'uses' => 'FrontendController@shop_page_view',
     'as'   =>'shop'
 ]);
 Route::get('/shop/page/{id}',[
     'uses' => 'FrontendController@product_view_by_cat_id',
     'as'   =>'product_by_cat'
 ]);
 //cart Routes
 Route::post('/add-to-cart',[
     'uses' => 'CartController@add_to_cart_data',
     'as'   =>'add_to_cart'
 ]);
 Route::get('/remove-cart-item/{id}',[
     'uses' => 'CartController@cart_remove_item_pro_id',
     'as'   =>'cart_remove_item'
 ]);
 Route::post('/update-cart-item',[
     'uses' => 'CartController@cart_update_item_pro_id',
     'as'   =>'cart_update'
 ]);
 // checkout Routes
 Route::get('/checkout/form',[
     'uses' => 'CheckoutController@checkout_form_view',
     'as'   =>'checkout_form',
      'middleware'=>'CustomerAuthChecked',
 ]);
 Route::post('/customer/signup',[
     'uses' => 'CheckoutController@customer_signup',
     'as'   =>'customer_signup',

 ]);
 Route::get('/checkout/shipping',[
     'uses' => 'CheckoutController@checkout_shipping_form',
     'as'   =>'checkout_shipping',

 ])->middleware('Customer','CartValueCheck');

 Route::post('/checkout/shipping',[
     'uses' => 'CheckoutController@save_shipping_info',
     'as'   =>'save_shipping',
 ]);

 Route::get('/checkout/payment',[
     'uses' => 'CheckoutController@checkout_payment_form',
     'as'   =>'checkout_payment',
 ])->middleware('ShippingInfoCheck','CartValueCheck');

 Route::post('/checkout/order',[
     'uses' => 'CheckoutController@save_order_info',
     'as'   =>'save_order',
 ])->middleware('ShippingInfoCheck','CartValueCheck');
 Route::get('/customer/logout',[
     'uses' => 'CheckoutController@logout_customer',
     'as'   =>'logout_submit',
 ]);
 Route::post('/customer/login',[
     'uses' => 'CheckoutController@loging_customer',
     'as'   =>'customer_login',
 ]);

//---------------------admin routes------------------------------

Route::group(['middleware' => ['adminAuth']], function () {
    //category Routes
    Route::get('/add/category','CategoryController@show_category_form')->name('add_category_form');
    Route::post('/add/category','CategoryController@add_category')->name('category_add');
    Route::get('/manage/category',[
        'uses' => 'CategoryController@manage_category',
        'as'   =>'manage_category'
    ]);
    Route::get('/unpublished/category/{id}',[
        'uses' => 'CategoryController@category_unpublish',
        'as'   =>'category_unpublish'
    ]);
    Route::get('/published/category/{id}',[
        'uses' => 'CategoryController@category_publish',
        'as'   =>'category_publish'
    ]);
    Route::get('/delete/category/{id}',[
        'uses' => 'CategoryController@category_delete',
        'as'   =>'category_delete'
    ]);
    Route::get('/edit/category/{id}/{name}',[
        'uses' => 'CategoryController@category_edit_form',
        'as'   =>'category_edit'
    ]);
    Route::post('/edit/category',[
        'uses' => 'CategoryController@update_category',
        'as'   =>'update_category'
    ]);
    //Product Routes
    Route::get('/product/add',[
        'uses' => 'ProductController@show_product_form',
        'as'   =>'product_form'
    ]);
    Route::post('/product/add',[
        'uses' => 'ProductController@product_save_info',
        'as'   =>'product_save'
    ]);
    Route::get('/product/manage',[
        'uses' => 'ProductController@product_show',
        'as'   =>'manage_product'
    ]);
    Route::get('/product/unpublished/{id}',[
        'uses' => 'ProductController@unpublished_product_by_id',
        'as'   =>'unpublished_product'
    ]);
    Route::get('/product/published/{id}',[
        'uses' => 'ProductController@published_product_by_id',
        'as'   =>'published_product'
    ]);
    Route::get('/product/delete/{id}',[
        'uses' => 'ProductController@delete_product_by_id',
        'as'   =>'delete_product'
    ]);
    Route::get('/product/edit/{id}',[
        'uses' => 'ProductController@edit_product_by_id',
        'as'   =>'edit_product'
    ]);
    Route::post('/product/update',[
        'uses' => 'ProductController@update_product_by_id',
        'as'   =>'product_update'
    ]);
    Route::get('/product/restore/{id}',[
        'uses' => 'ProductController@restore_product_by_id',
        'as'   =>'restore_product'
    ]);
    Route::get('/product/force/delete/{id}',[
        'uses' => 'ProductController@forceDelete_product_by_id',
        'as'   =>'forceDelete_product'
    ]);
    // Order Routes
    Route::get('/manage/order',[
        'uses' => 'OrderController@manage_order_info',
        'as'   =>'manage_order'
    ]);
    Route::get('/order/details/{id}',[
        'uses' => 'OrderController@order_detail_by_order_id',
        'as'   =>'order_details'
    ]);
    Route::get('/order/invoice/{id}',[
        'uses' => 'OrderController@order_invoice_view_by_order_id',
        'as'   =>'order_invoice'
    ]);

});
Route::get('/order/invoice/download/{id}',[
        'uses' => 'OrderController@order_invoice_download_by_order_id',
        'as'   =>'order_invoice_download'
    ]);







Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');
