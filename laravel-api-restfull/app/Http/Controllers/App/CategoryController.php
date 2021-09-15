<?php

namespace App\Http\Controllers\APP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::orderBy('id','desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $validate = $request->validate([
            'category_name'=>'required|unique:categories,category_name',
            'category_description'=>'required',
            'publication_status'=>'required',
        ]);
        DB::table('categories')->insert([
            'category_name'=>$request->category_name,
            'category_description'=>$request->category_description,
            'publication_status'=>$request->publication_status,
            'created_at'=>Carbon::now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            // 'category_name'=>'required|unique:categories,category_name',
            'category_name'=>'required',
            'category_description'=>'required',
            'publication_status'=>'required',
        ]);

     DB::table('categories')->where('id',$id)->update([
        'category_name'=>$request->category_name,
        'category_description'=>$request->category_description,
        'publication_status'=>$request->publication_status,

     ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
