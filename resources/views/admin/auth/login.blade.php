@extends('admin.admin_layout')

@section('admin_content')

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
      <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin <span class="tx-info tx-normal">login</span></div>
      <div class="tx-center mg-b-60"> Admin Template Ecom</div>


      <form method="POST" action="{{ route('admin.login') }}">
        @csrf
      <div class="form-group">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your Email" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
      </div><!-- form-group -->
      <button type="submit" class="btn btn-info btn-block">Log In</button>
    </form>
    
    </div><!-- login-wrapper -->
  </div><!-- d-flex -->

@endsection
