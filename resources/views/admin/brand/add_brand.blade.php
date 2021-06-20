@extends('admin.admin_layout')
@section('brand') active show-sub @endsection
@section('brand2') active @endsection
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


<form method="post" action="{{route('admin.brand.store')}}">
    @csrf
    <div class="wd-300">
      <div class="d-flex mg-b-30">
        <div class="form-group mg-b-0">
          <label>Category Name: <span class="tx-danger">*</span></label>
          <input type="text" name="brand_name" class="form-control wd-250 @error('brand_name') is-invalid
              
          @enderror" placeholder="Enter brand name" >
          @error('brand_name')
           <span class="text-danger">{{$message}}</span>   
          @enderror
        </div><!-- form-group -->
       
      </div><!-- d-flex -->
      <button type="submit" class="btn btn-info">Submit </button>
    </div>
    </form>

@endsection