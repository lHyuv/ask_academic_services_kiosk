@extends('layouts.header')

@section('content')


<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="login-brand">
          <img src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png" alt="logo" width="100" class="shadow-light rounded-circle">
                <h4>Academic Services</h4>
            </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                <div class="d-block">
                            <label for="name" class="control-label">{{ __('Email') }}</label>

                          
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="name" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">{{ __('Password') }}</label>

                           
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="d-block">
                            <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                  <div class="form-group">
                  <div class="d-block">
                            <label for="user_type_id" class="control-label">{{ __('User Type') }}</label>

                          
                              
                                <select name="role_id" id="role_id" class="form-control" required>
                                
                                   @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{  $role->name }}</option>
                                   @endforeach
                                </select>
                           
                        </div>
                        </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     Register <i class="fas fa-sign-in-alt"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Have an account already? <a href="{{ route('login') }}">Login here</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
