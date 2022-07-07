@extends('layouts.header')

@section('page_title')
    {{ "Login" }}
@endsection

@section('content')

<!----> 
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
           
            <div class="login-brand">
            <img src="{{ URL::to('/') }}/template/img/kiosk/icons/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
                <h4>Academic Services</h4>
            </div>
            

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
              <p>Login using your email and password.</p>
                <form method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required  autofocus>

                    @error('username')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                        @if (Route::has('password.request'))
                      <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                      @endif
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <!--
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  -->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login <i class="fas fa-sign-in-alt"></i>
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="{{ route('register') }}">Register here</a>
            </div>
            <div class="mt-5 text-muted text-center">
            <a href="/guest">Go to home</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
  sessionStorage.setItem('token', null);
</script>
@endsection
