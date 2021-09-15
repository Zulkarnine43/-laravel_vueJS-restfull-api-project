<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{

    public function show_category_form()
    {
        return view('dashboard/category/category_form');
    }
    public function manage_category()
    {
         $categories = Category::paginate(8);
        return view('dashboard.category.manage_category',['categories'=>$categories]);
    }
        public function add_category(Request $request)
        {
            // return $request->all();
            $validate = $request->validate([
                'category_name'=>'required|unique:categories,category_name',
                'category_description'=>'required',
                'publication_status'=>'required',
            ]);

            // $category = new Category;
            // $category->category_name = $request->category_name;
            // $category->category_description = $request->category_description;
            // $category->publication_status = $request->publication_status;
            // $category->save();

            // facade ar madhome
            // Category::create($request->all());
            DB::table('categories')->insert([
                'category_name'=>$request->category_name,
                'category_description'=>$request->category_description,
                'publication_status'=>$request->publication_status,
                'created_at'=>Carbon::now(),
            ]);


            return redirect('/add/category')->with('message_add_cat','Category Add Successfully');
            // return back()->with('message_add_cat','Category Add Successfully');
        }
    public function category_unpublish($id)
    {
        DB::table('categories')->where('id', $id)->update([
            'publication_status'=> 0,
        ]);
        // $category = Category::find($id);
        // $category->publication_status = 0;
        // $category->save();
        return redirect('/manage/category')->with('Unpublish_message','Category Unpublished Successfully');
    }
    public function category_publish($id)
    {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/manage/category')->with('publish_message','Category Published Successfully');
    }
    public function category_delete($id)
    {
        // DB::table('categories')->where('id',$id)->delete();
        // Category::find($id)->delete();
        $category = Category::find($id);
        $category->delete();
        return redirect('/manage/category')->with('Unpublish_message','Category Delete Successfully');
    }
    public function category_edit_form($id)
    {
       $category = Category::find($id);
        return view('dashboard.category.category_edit_form',['category'=>$category]);
    }
    public function update_category(Request $request)
    {
        $validate = $request->validate([
                'category_name'=>'required',
                'category_description'=>'required',
                'publication_status'=>'required',
            ]);

         DB::table('categories')->where('id',$request->category_id)->update([
                    'category_name'=>$request->category_name,
                    'category_description'=>$request->category_description,
                    'publication_status'=>$request->publication_status,

                ]);
        return back()->with('Category_update_message','Category Update Successfully');
    }



}
