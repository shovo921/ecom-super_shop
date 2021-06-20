@extends('admin.admin_layout')
@section('coupon') active show-sub @endsection
@section('coupon2') active @endsection
@section('admin_content')


<div class="sl-mainpanel">
   

    <div class="sl-pagebody">
      

    <div class="card">
       


      
   
 
        <div class="table-wrapper">
    
        </div><!-- table-wrapper -->
      </div><!-- card -->

      @if(session()->has('message'))  
      <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Well done!</strong>  {{ session()->get('message') }}</span>
          </div><!-- d-flex -->
        </div><!-- alert -->
        @endif


<form method="post" action="{{route('admin.coupon.update')}}">
    @csrf
    <div class="wd-300">
      <div class="d-flex mg-b-30">
        <div class="form-group mg-b-0">
            <input type="hidden" value="{{$coupon->id}}" name="id" >
          <label>Coupon Name: <span class="tx-danger">*</span></label>
          <input type="text" name="coupon_name" value="{{$coupon->coupon_name}}" class="form-control wd-250 @error('coupon_name') is-invalid
              
          @enderror" placeholder="Enter coupon name" >
          @error('coupon_name')
           <span class="text-danger">{{$message}}</span>   
          @enderror
          <label>Coupon Discount: <span class="tx-danger">*</span></label>
          <input type="text" name="coupon_discount" value="{{$coupon->coupon_discount}}"  class="form-control wd-250 @error('coupon_discount') is-invalid
              
          @enderror" placeholder="Enter coupon discoun %" >
          @error('coupon_discount')
           <span class="text-danger">{{$message}}</span>   
          @enderror
        </div><!-- form-group -->
       
      </div><!-- d-flex -->
      <button type="submit" class="btn btn-info">Update </button>
    </div>
    </form>

@endsection