<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $categories = Category::latest()->get();

        
        return view('admin.category.index',compact('categories'));
        
    }
    
    public function add(){

        
        return view('admin.category.add_category');
        
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

   
     Category::insert( [
        'category_name' =>$request->category_name,
        'created_at' => Carbon::now()

     ]);

     return redirect()->back()->with('message', 'Your data was successfully submitted !');
        
    }

    public function Delete($cat_id){

    Category::findorfail($cat_id)->delete();
    return redirect()->back()->with('message_delete', 'Your data was successfully deleted !');


        
    }
    public function edit($cat_id)
    {
      $category =Category::findorfail($cat_id);
      return view('admin.category.edit',compact('category'));
    }
   

    public function update(Request $request)
    {
        $cat_id = $request->id;
        Category::find($cat_id)->update([
        'category_name'=> $request->category_name,
        'updated_at'=>Carbon::now()

        ]);
        
        return redirect()->route('admin.category.index')->with('message', 'Your data was successfully Updated !');
    }

    public function inactive($cat_id){
Category::find($cat_id)->update([
    'status'=> 0
]);
return redirect()->back()->with('message', 'Your category Incative now !');

    }
public function active($cat_id)
{
Category::find($cat_id)->update([

    'status'=> 1,
]);
return redirect()->back()->with('message', 'Your category Active !');

}
    
}
