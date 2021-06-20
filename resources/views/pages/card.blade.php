@extends('layouts.fontend_master')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend')}}/img/breadcrumb.jpg">
    <div class="container">
 
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
            @if(session()->has('card'))  
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
        <span><strong>Well done!</strong>  {{ session()->get('card') }}</span>
        </div><!-- d-flex -->
    </div><!-- alert -->
  @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    
                             
                                @foreach ($cards as $row )
                                    
                                <td class="shoping__cart__item">
                                    <img src="{{asset($row->product->image_one)}}" alt="" width="100px">
                                    <h5>{{$row->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$row->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <form action="{{route('card.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="pro-qty">
                                     
                                            <input type="number" name="qty" value="{{$row->qty}}" min="1">
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            
                                        </div>
                                        <button  type="submit" class="btn btn-sm btn-success"> update</button>
                                    </form>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{$row->price * $row->qty}}
                                </td>
                                <td class="shoping__cart__item__close">
                                   <a href="{{route('card.close',['id'=>$row->id,])}}"> <span class="icon_close"> </span></a>
                                </td>
                            </tr>
                
                            @endforeach
                           
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('/')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    
                </div>
            </div>
            <div class="col-lg-6">
                @if(Session::has('coupon'))
                 <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Coupon name : {{ session()->get('coupon')['coupon_name'] }}</h5>
                
                    </div>
                </div> 
                @else
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="{{route('discount.apply')}}" method="POST">
                            @csrf
                            <input type="text" name="coupon_name" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        @php
                        if (Session::has('coupon')){
                            $discount=session()->get('coupon')['coupon_discount'];
                            $discount_price=$subtotal * $discount /100;
                        }
                        @endphp
                        @if (Session::has('coupon'))
                        <li>Subtotal <span>${{$subtotal}}</span></li>
                        <li>Discount <span>{{$discount}} %</span></li>
                        <li>Discount Pirce <span>{{$discount_price}}</span></li>
                        <li>total <span>${{$subtotal -$discount_price}}</span></li>  
                        @else
                        <li>Subtotal <span>${{$subtotal}}</span></li>
                       
                        @endif
                    </ul>
                    <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection