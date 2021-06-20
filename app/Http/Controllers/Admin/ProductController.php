<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

            public function index(){

            $products =Product::latest()->get();
            return view('admin.product.index',compact('products'));
            }

    public function add(){
        $categories=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('admin.product.add_product',compact('categories','brands'));

    }
    public function store(Request $request){
       $request->validate([
        'product_name'=> 'required|max:255',
        'product_code'=> 'required|max:255',
        'product_quantity'=> 'required|max:255',
        'product_price'=> 'required|max:255',
        'category_id'=> 'required|max:255',
        'brand_id'=> 'required|max:255',
        'short_description'=> 'required',
        'long_description'=> 'required',
        'image_one'=> 'required|mimes:jpg,jpeg,png,gif',
        'image_two'=> 'required|mimes:jpg,jpeg,png,gif',
        'image_three'=> 'required|mimes:jpg,jpeg,png,gif',


       ],[
          'category_id.required' =>'select category name',
          'brand_id.required'=>'select brand name',
       ]); 
       
            $image_one = $request->file('image_one');
            $name_gen1 = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen1);
            $img_url1 ='fontend/img/product/upload/product'.$name_gen1;

            $image_two = $request->file('image_two');
            $name_gen2 =hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen2);
            $img_url2 ='fontend/img/product/upload/product'.$name_gen2;

            $image_three = $request->file('image_three');
            $name_gen3 =hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen3);
            $img_url3 ='fontend/img/product/upload/product'.$name_gen3;

            Product::insert([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
                'product_code' => $request->product_code,
                'product_quantity' => $request->product_quantity,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'price' => $request->product_price,
                'image_one' =>   $img_url1 ,
                'image_two' =>   $img_url2 ,
                'image_three' => $img_url3 ,
                'created_at'=> Carbon::now(),
                

                ]);
                return redirect()->back()->with('message','product added');



    }
    public function delete(Request $request)
    {
        $img_one=$request->img_one;
        $img_two=$request->img_two;
        $img_three=$request->img_three;
        unlink($img_one);
        unlink($img_two); 
        unlink($img_three);
        $product_id=$request->id;
        Product::findorfail($product_id)->delete();
        return redirect()->back()->with('message','product delete');

    }
    public function inactive($product_id){
        Product::find($product_id)->update([
            'status'=> 0
        ]);
        return redirect()->back()->with('message', 'Your product Incative now !');
        
            }
        public function active($product_id)
        {
        Product::find($product_id)->update([
        
            'status'=> 1,
        ]);
        return redirect()->back()->with('message', 'Your product Active  now !');
        
        }
           
        

        public function edit($product_id)
        {
            $categories=Category::latest()->get();
            $brands=Brand::latest()->get();
            $product=Product::find($product_id);
            return view('admin.product.edit',compact('product','categories','brands'));


        }
        public function update(Request $request){

       $product_id = $request->id;
       Product::findorfail($product_id)->update([

        'product_name'=> $request->product_name,
        'category_id' =>$request->category_id,
        'brand_id'=>$request->brand_id,
        'product_code'=>$request->product_code,
        'product_quantity'=>$request->product_quantity,
        'short_description'=>$request->short_description,
        'long_description'=>$request->long_description,
        'price'=>$request->product_price

       ]); 
       return redirect()->route('admin.product.manage')->with('message', 'Your product updated !');

            
        }

        public function image_update(Request $request)
        {
               $product_id=$request->id;
               $old_one=$request->img_one;
               $old_two=$request->img_two;
               $old_three=$request->img_three;

               if($request->has('image_one'))
               {
                if($old_one){
                    unlink($old_one);
                }
                
                $image_one= $request->file('image_one');
                $name_gen1 =hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen1);
                $img_url1 ='fontend/img/product/upload/product'.$name_gen1;

                Product::find($product_id)->update([

                    'image_one'=>$img_url1,
                    'updated_at'=>Carbon::now(),
                ]);
          
            return redirect()->route('admin.product.manage')->with('message','your product image updated');
                }
                
               if($request->has('image_two'))
               {

                unlink($old_two);
                $image_one= $request->file('image_two');
                $name_gen2 =hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen2);
                $img_url2 ='fontend/img/product/upload/product'.$name_gen2;

                Product::find($product_id)->update([

                    'image_two'=>$img_url2,
                    'updated_at'=>Carbon::now(),
                ]);
          
            return redirect()->route('admin.product.manage')->with('message','your product image updated');
                }
                
               if($request->has('image_three'))
               {

                unlink($old_three);
                $image_one= $request->file('image_three');
                $name_gen3 =hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen3);
                $img_url3 ='fontend/img/product/upload/product'.$name_gen3;

                Product::find($product_id)->update([

                    'image_three'=>$img_url3,
                    'updated_at'=>Carbon::now(),
                ]);
          
            return redirect()->route('admin.product.manage')->with('message','your product image updated');
                }

                if($request->has('image_three') && $request->has('image_two') )
               {

                unlink($old_three);
                $image_one= $request->file('image_three');
                $name_gen3 =hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen3);
                $img_url3 ='fontend/img/product/upload/product'.$name_gen3;

                Product::find($product_id)->update([

                    'image_three'=>$img_url3,
                    'updated_at'=>Carbon::now(),
                ]);
                unlink($old_two);
                $image_one= $request->file('image_two');
                $name_gen2 =hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/product'.$name_gen2);
                $img_url2 ='fontend/img/product/upload/product'.$name_gen2;

                Product::find($product_id)->update([

                    'image_two'=>$img_url2,
                    'updated_at'=>Carbon::now(),
                ]);
          
            return redirect()->route('admin.product.manage')->with('message','your product image updated');
                }


    }


    
}
