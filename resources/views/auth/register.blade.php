@extends('layouts.header')

@section('content')


<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="login-brand">
                <h3>Academic Services</h3>
            </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <div class="d-block">
                            <label for="name" class="control-label">{{ __('Username') }}</label>

                          
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"  required autocomplete="name" autofocus>

                                @error('username')
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

                          
                              
                                <select name="user_type_id" id="user_type_id" class="form-control" required>
                                
                                   @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{  $role->user_type_name }}</option>
                                   @endforeach
                                </select>
                           
                        </div>
                        </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     Register
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
