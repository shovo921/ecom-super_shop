@extends('layouts.fontend_master')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('fontend')}}/img/breadcrumb.jpg">
    <div class="container">
 
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist </h2>
                    <div class="breadcrumb__option">
                        <a href="{{'/'}}">Home</a>
                        <span>Wishlist </span>
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
                                <th>Add to card</th>
                                <th>Remove</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    
                             
                                @foreach ($wishlist as $row )
                                    
                                <td class="shoping__cart__item">
                                    <img src="{{asset($row->product->image_one)}}" alt="" width="100px">
                                    <h5>{{$row->product->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$row->product->price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <a class="btn btn-sm btn-success" href="{{route('add.card',['id'=> $row->product->id,'price'=> $row->product->price])}}"><i class="fa fa-shopping-cart"></i>
                                </td>
                                
                                <td class="shoping__cart__item__close">
                                   <a href="{{route('wishlist.close',['id'=>$row->id,])}}"> <span class="icon_close"> </span></a>
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
           
    
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection