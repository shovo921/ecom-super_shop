@extends('admin.admin_layout')
@section('product') active show-sub @endsection
@section('product2') active @endsection
@section('admin_content')



   



        <div class="sl-mainpanel">
        
    
          <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>Product Edit</h5>
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
             
            </div><!-- sl-page-title -->
    
            <div class="card pd-20 pd-sm-40">
             
            <form action="{{route('admin.product.update')}}" method="POST" enctype="multipart/form-data">
              @csrf

              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="form-layout">
                <div class="row mg-b-25">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" value="{{$product->product_name}}" name="product_name" placeholder="Enter name">
                      @error('product_name')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text"value="{{$product->product_code}}" name="product_code"  placeholder="Enter code name">
                      @error('product_code')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">Product Quantity: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" value="{{$product->product_quantity}}" name="product_quantity"  placeholder="Enter code name">
                      @error('product_quantity')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label">price: <span class="tx-danger">*</span></label>
                      <input class="form-control" type="text" name="product_price" value="{{$product->price}}" placeholder="Enter price ">
                      @error('product_price')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                  </div><!-- col-4 -->
              
              
              
               
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose category" name="category_id">
                        <option label="Choose category"></option>
                        @foreach ($categories as $category )
                          
                        <option value="{{$category->id}}"{{$category->id == $product->category->id ? "selected":""}}>{{$category->category_name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
                  </div><!-- col-4 -->
                  <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                      <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                      <select class="form-control select2" data-placeholder="Choose Brand" name="brand_id">
                        <option label="Choose Brand"></option>
                        @foreach ($brands as $brand )
                          
                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ?"selected":""}}>{{$brand->brand_name}}</option>
                        @endforeach
                     
                      </select>
                      @error('brand_id')
                      <strong class="text-danger">{{$message}}</strong>
                    @enderror
                    </div>
                  </div><!-- col-4 -->
                </div><!-- row -->

               
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                    <textarea name="short_description" id="summernote">{{$product->short_description}}</textarea>
                    @error('short_description')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                    <textarea name="long_description" id="summernote1">{{$product->long_description}}</textarea>
                    @error('long_description')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                </div><!-- col-4 -->

                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5 " type="submit">Submit</button>
                  <button class="btn btn-secondary"><a href="{{route('admin.product.manage')}}">Cancel</a></button>
                </div><!-- form-layout-footer -->
              </form>
              <form action="{{route('admin.product.image_update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <input type="hidden" name="img_one" value="{{$product->image_one}}">
                <input type="hidden" name="img_two" value="{{$product->image_two}}">
                <input type="hidden" name="img_three" value="{{$product->image_three}}">
                <div class="col-lg-4">
                  <img src="{{asset($product->image_one)}}" alt="" height="50px" width="50px">
       
                 </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Main Thumble: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image_one"  >
                    @error('image_one')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <img src="{{asset($product->image_two)}}" alt="" height="50px" width="50px">
       
                 </div><!-- col-4 -->
                <div class="col-4">
                  <div class="form-group">
                    <label class="form-control-label">Image two: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image_two" >
                    @error('image_two')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <img src="{{asset($product->image_three)}}" alt="" height="50px" width="50px">
       
                 </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">image three: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="file" name="image_three" >
                    @error('image_three')
                        <strong class="text-danger">{{$message}}</strong>
                      @enderror
                  </div>
                </div><!-- col-4 -->
                

                <div class="form-layout-footer">
                  <button class="btn btn-info mg-r-5 " type="submit">Submit</button>
                  <button class="btn btn-secondary"><a href="{{route('admin.product.manage')}}">Cancel</a></button>
                </div><!-- form-layout-footer -->
              </div><!-- form-layout -->
            </form>
           
            </div><!-- card -->
    
         
    
          </div><!-- sl-pagebody -->
          <footer class="sl-footer">
            <div class="footer-left">
              <div class="mg-b-2">Copyright &copy; 2021. . All Rights Reserved.</div>
              <div>Made by .</div>
            </div>
            <div class="footer-right d-flex align-items-center">
              <span class="tx-uppercase mg-r-10">Share:</span>
              <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
              <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
            </div>
          </footer>
        </div><

@endsection


@push('css')
<link href="{{asset('backend')}}/lib/medium-editor/default.css" rel="stylesheet">
<link href="{{asset('backend')}}/lib/summernote/summernote-bs4.css" rel="stylesheet">
@endpush



@push('js')
<script src="{{asset('backend')}}/lib/medium-editor/medium-editor.js"></script>
<script src="{{asset('backend')}}/lib/summernote/summernote-bs4.min.js"></script>

<script>
  $(function(){
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    })
    $('#summernote1').summernote({
      height: 150,
      tooltip: false
    })
  });
</script>
@endpush