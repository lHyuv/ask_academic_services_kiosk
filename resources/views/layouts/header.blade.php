<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'Academic Services')</title>

    <!-- Scripts -->
    <!--
    <script src="{{ asset('js/app.js') }}" defer></script>
    -->
    <!-- Fonts -->
     <!--
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    -->
    <!-- Styles -->
     <!--
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    -->     <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('template/vendors/toastr/js/toastr.min.js') }}"></script>



    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('template/js/scripts.js') }}"></script>
    <script src="{{ asset('template/js/stisla.js') }}"></script>
  
    <script src="{{ asset('template/custom/custom.js') }}"></script>
  

        <!-- General JS Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
    <script src="{{ asset('template/vendors/datatable/js/datatables.min.js') }}"></script>
    <script src="{{ asset('template/vendors/reveal-password/js/show-hide-password.min.js') }}"></script>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/components.css') }}" rel="stylesheet">
   
    <link href="{{ asset('template/custom/keyboard.css') }}" rel="stylesheet">
    <link href="{{ asset('template/custom/step.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/datatable/css/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/parsley/css/custom-parsley.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/toastr/css/iziToast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/toastr/css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendors/select2/css/select2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!--BS Stepper--> 
    <link href="https://unpkg.com/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet">
    <script src = "https://unpkg.com/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <!--BS Stepper:end--> 
    <link href="{{ asset('template/custom/custom.css') }}" rel="stylesheet">
    <!--Qrious--> 
    <script src = "{{ asset('template/vendors/qrious/js/qrious.js') }}"></script>

    <!--Moment JS--> 
    <script src = "{{ asset('template/vendors/momentjs/js/moment-2.29.3.min.js') }}"></script>

    <!--Chart JS--> 
    <script src = "{{ asset('template/vendors/chartjs/js/chart.min.js') }}"></script>

    <!--Select2--> 
    <script src = "{{ asset('template/vendors/select2/js/select2.min.js') }}"></script>
    <noscript>
  
     <meta HTTP-EQUIV="REFRESH" content="0; url= {{ URL::to('/') }}/noscript"> 
  </noscript>
</head>

    @if (Route::current()->getName() == 'guest' || Route::current()->getName() == 'guest2')

    <body class = "custom-bg">

    <div id="app">
    <div class="main-wrapper main-wrapper-1">
        <!------->
    <nav class="navbar-fixed main-navbar" id = 'guest_header1'>
    <section class="section shadow-none border-0">
        <div class="section-header  shadow-none border-0">
        <img src="{{ URL::to('/') }}/template/img/kiosk/icons/logo.png" alt="logo" width="70" class="shadow-light rounded-circle">
            <h1 class = "ml-2">Polytechnic University of the Philippines <br> Quezon City</h1>

        
        </div>
      
    </section>
    </nav>
    <nav class="navbar-expand-lg main-navbar" id = 'guest_header2' style='display:none;'>
    <section class="section shadow-none border-0">
        <div class="section-header shadow-none border-0">
        <img src="{{ URL::to('/') }}/template/img/kiosk/icons/logo.png" alt="logo" width="70" class="shadow-light rounded-circle">
            <h1 class = "ml-2">Academic Services</h1>

        
        </div>
      
    </section>
    </nav>
    @elseif (Route::current()->getName() != 'login' &&  Route::current()->getName() != 'register')
    <body class = "bg-gray">

    <div id="app">
    <div class="main-wrapper main-wrapper-1">
          <!------->
    <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar" id = "header">
                <!--
                <a class="navbar-brand" href="/">
                  Academic Services
                </a>
                -->
 

             
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
             
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Left Side Of Navbar -->
                 
                    <form class="form-inline mr-auto">
                    @if(Auth::check())
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>

                   </ul>
                   @endif
                    </form>
                   

                  
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">

                        <!-- Authentication Links -->
                        @guest
                        <li class="dropdown dropdown-list-toggle">
                            <a href="javascript:void(0);" 
                            onclick = "window.location.href = '/guest'"
                            role = "button" class="nav-link notification-toggle nav-link-lg beep">
                            <i class="fas fa-home"></i></a>

                        </li>

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        
                        @else
                        @if(Auth::check())

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class = 'fa fa-user-circle'></i>
                                @if(isset(Auth::user()->client)) 
                                {{ Auth::user()->client->first_name}}
                                @else
                                {{ Auth::user()->email}} 
                                @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <!--<div class="dropdown-title">Logged in n min ago</div>-->
                                     <a class="dropdown-item" href="/profile"
                                       onclick="/profile">
                                       <i class="far fa-user"></i> Profile
                                    </a>
                                    <div class = "dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    

                                </div>
                            </li>
                        @endif
                        @endguest
                    </ul>
                </div>
    
        </nav>
@endif

@includeWhen(Auth::check() && (Route::current()->getName() != 'guest2' && Route::current()->getName() != 'guest'),'layouts.sidebar')

        <main class="py-4">
@if(Auth::check())
        <div class="main-content pt-1">
@endif
            @yield('content')
@if(Auth::check())
        </div>
@endif
        </main>

@includeWhen(Route::current()->getName() != 'login' &&  Route::current()->getName() != 'register','layouts.footer')

