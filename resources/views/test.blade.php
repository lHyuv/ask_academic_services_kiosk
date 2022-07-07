@extends('layouts.header')

@section('page_title')
    {{ "Test" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Welcome!</h1>
        </div>  
        </div>
      
</section>
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>

</div>

@endsection


