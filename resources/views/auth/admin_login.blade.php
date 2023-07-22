 @extends('layouts.admin')

 @section('admin_content')
<div class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url ('/') }}" class="h1"><b>Daily-Ecommerce</a>
    </div> 
    <div class="card-body">
      <p class="login-box-msg">Admin Login</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="input-group mb-3">
        <input type="email" name="email" class="form-control {{$errors->first('email') ? 'is-invalid' : ''}}" value="{{ old('email') }}" placeholder="Your Email" autocomplete="email" autofocus>
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="input-group mb-3">
        <input type="password" name="password" class="form-control {{$errors->first('password') ? 'is-invalid' : ''}}" value="{{ old('password') }}" placeholder="Your Password" autocomplete="current-password">
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="row">
          <div class="col-8">
            <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</div>
@if (Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                        
 @endsection