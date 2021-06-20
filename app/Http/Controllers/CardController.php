<?php

namespace App\Http\Controllers;
use App\Card;
use App\Coupon;
use App\Wishlist;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtotal=Card::all()->where('user_ip',request()->ip())->sum(
            function($t){
                return $t->price * $t->qty;
            }
        );
       $cards= Card::where('user_ip',request()->ip())->get();
       return view('pages.card',compact('cards','subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_card(Request $request)
    { 

        $check=Card::where('product_id',$request->id)->where('user_ip',request()->ip())->first();
        if($check){
            Card::where('product_id',$request->id)->where('user_ip',request()->ip())->increment('qty');
            return redirect()->back()->with('message','your product increment into card');
        }
            else{
        Card::insert([
            'product_id'=> $request->id,
            'qty'=>1,
            'price'=>$request->price,
            'user_ip'=>request()->ip()
        ]);
        return redirect()->back()->with('message','your product add into card');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
       $id = $request->id;
       $qty=$request->qty;
     
       Card::where('id',$id)->where('user_ip',request()->ip())->update([
           'qty'=> $request->qty,
       ]);
       return redirect()->back()->with('card','your product quuantity updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $card_id=$request->id;
        Card::where('id',$card_id)->where('user_ip',request()->ip())->delete();
        return redirect()->back()->with('card','your product Remove from card');
    }
    public function discount_apply (Request $request){

        
        $check=Coupon::where('coupon_name',$request->coupon_name)->first();
        if( $check){
            Session::put('coupon',[
                   'coupon_name'=> $check->coupon_name, 
                   'coupon_discount' => $check->coupon_discount, 
            ]);
            return redirect()->back()->with('card','sussessfully coupon apply');
        }
        else{
            return redirect()->back()->with('card','your coupon wrong ');
        }
   

    }
    // wishlist card
    public function add_wishlist(Request $request){
      
       if(Auth::check()){
        $check=Wishlist::where('user_id',Auth::user()->id)->where('product_id',$request->id)->first();
       
        if($check){
            
            return redirect()->back()->with('message','your wishlist already have this item ');
        }

         else{
            Wishlist::insert([
                'product_id'=> $request->id,
                'qty'=>1,
                'price'=>$request->price,
                'user_id'=> Auth::user()->id

            ]);
            return redirect()->back()->with('message','product added into wishlist');
        }  
       

       
      

    }
    return redirect()->back()->with('login','please login first');
}

// show wishlist
public function show_wishlist(){
 
    $user =Auth::user()->id;
    $wishlist=Wishlist::where('user_id',$user )->get();
    return view('pages.wishlist',compact('wishlist'));
}

public function wishlist_close(Request $request){

    $id=$request->id;
    Wishlist::where('id',$id)->delete();
    return redirect()->back()->with('message','you are suessfully delete item form wishlist');
}


}
