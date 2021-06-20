<?php

namespace App\Http\Controllers\Admin;


use App\Coupon;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
        $coupons = Coupon::latest()->get();

        
        return view('admin.coupon.index',compact('coupons'));
        
    }
    
    public function add(){

        
        return view('admin.coupon.add_coupon');
        
    }

    public function store(Request $request){
        $request->validate([
            'coupon_name' => 'required|unique:coupons,coupon_name',
            'coupon_discount' => 'required'
        ]);

   
        Coupon::insert( [
        'coupon_name' =>$request->coupon_name,
        'coupon_discount' =>$request->coupon_discount,
        'created_at' => Carbon::now()

     ]);

     return redirect()->back()->with('message', 'Your data was successfully submitted !');
        
    }

    public function Delete($coupon_id){

        Coupon::findorfail($coupon_id)->delete();
    return redirect()->back()->with('message_delete', 'Your data was successfully deleted !');


        
    }
    public function edit($cat_id)
    {
      $coupon =Coupon::findorfail($cat_id);
      return view('admin.coupon.edit',compact('coupon'));
    }
   

    public function update(Request $request)
    {
        $cat_id = $request->id;
        Coupon::find($cat_id)->update([
        'coupon_name'=> $request->coupon_name,
        'coupon_discount'=> $request->coupon_discount,
        'updated_at'=>Carbon::now()

        ]);
        
        return redirect()->route('admin.coupon.index')->with('message', 'Your data was successfully Updated !');
    }

    public function inactive($cat_id){
        Coupon::find($cat_id)->update([
    'status'=> 0
]);
return redirect()->back()->with('message', 'Your coupon Incative now !');

    }
public function active($cat_id)
{
    Coupon::find($cat_id)->update([

    'status'=> 1,
]);
return redirect()->back()->with('message', 'Your coupon Active !');

}
}
