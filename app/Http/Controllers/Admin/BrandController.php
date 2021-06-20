<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $brands = Brand::latest()->get();

        
        return view('admin.brand.index',compact('brands'));
        
    }
    
    public function add(){

        
        return view('admin.brand.add_brand');
        
    }

    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);

   
        Brand::insert( [
        'brand_name' =>$request->brand_name,
        'created_at' => Carbon::now()

     ]);

     return redirect()->back()->with('message', 'Your data was successfully submitted !');
        
    }

    public function Delete($cat_id){

        Brand::findorfail($cat_id)->delete();
    return redirect()->back()->with('message_delete', 'Your data was successfully deleted !');


        
    }
    public function edit($cat_id)
    {
      $brand =Brand::findorfail($cat_id);
      return view('admin.brand.edit',compact('brand'));
    }
   

    public function update(Request $request)
    {
        $cat_id = $request->id;
        Brand::find($cat_id)->update([
        'brand_name'=> $request->brand_name,
        'updated_at'=>Carbon::now()

        ]);
        
        return redirect()->route('admin.brand.index')->with('message', 'Your data was successfully Updated !');
    }

    public function inactive($cat_id){
        Brand::find($cat_id)->update([
    'status'=> 0
]);
return redirect()->back()->with('message', 'Your category Incative now !');

    }
public function active($cat_id)
{
    Brand::find($cat_id)->update([

    'status'=> 1,
]);
return redirect()->back()->with('message', 'Your category Active !');

}
}
