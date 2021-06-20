@extends('admin.admin_layout')
@section('coupon') active show-sub @endsection
@section('coupon1') active @endsection
@section('admin_content')


  
<div class="sl-mainpanel">
   

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Coupon Table</h5>
     
      </div><!-- sl-page-title -->
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

        @if(session()->has('message_delete'))  
        <div class="alert alert-info" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-ios-information alert-icon tx-24 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Heads up!</strong> {{ session()->get('message_delete') }}</span>
          </div><!-- d-flex -->
        </div>
        @endif
    <div class="card pd-20 pd-sm-40">
       
@php
    $sl=1;
@endphp
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-15p">Sl</th>
                <th class="wd-15p">Coupon name</th>
                <th class="wd-15p">Coupon Discount</th>
                <th class="wd-20p">status</th>
                <th class="wd-10p">Action</th>
         
              </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon )
                    
               
              <tr>
                <td>{{$sl++}}</td>
                <td>{{$coupon->coupon_name}}</td>
                <td>{{$coupon->coupon_discount}} %</td>
                <td>
                        @if ($coupon->status == 1)
                        <span class="badge badge-success">Active</span>
                           @else 
                           <span class="badge badge-danger">Inactive</span>
                        @endif

                </td>
                <td>

                    <a href="{{url('admin/coupon/'.$coupon->id)}}" class="btn btn-sm btn-success"> <i class="fa fa-pencil"></i></a>
                    <a href="{{url('admin/coupon/delete/'.$coupon->id)}}" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i></a>
                    @if ($coupon->status == 1)
                    <a href="{{url('admin/coupon/inactive/'.$coupon->id)}}" class="btn btn-sm btn-danger"> <i class="fa fa-arrow-down"></i></a>
                    @else
                    <a href="{{url('admin/coupon/active/'.$coupon->id)}}" class="btn btn-sm btn-success"> <i class="fa fa-arrow-up"></i></a>
                    @endif
                   
                </td>
               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->

      

   
 

@endsection

@push('js')
<script src="{{asset('backend')}}/lib/highlightjs/highlight.pack.js"></script>
<script src="{{asset('backend')}}/lib/datatables/jquery.dataTables.js"></script>
<script src="{{asset('backend')}}/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="{{asset('backend')}}/js/starlight.js"></script>

<script>
$(function(){
  'use strict';

  $('#datatable1').DataTable({
    responsive: true,
    language: {
      searchPlaceholder: 'Search...',
      sSearch: '',
      lengthMenu: '_MENU_ items/page',
    }
  });

 

  // Select2
  $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

});
</script>
@endpush