@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
   
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Home</div>
            </div>
        </div>
      
</section>

<h5>Today</h5>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                   @if(isset($today_requests))
                   {{ count((array)$today_requests) }}
                   @else
                   0
                   @endif

                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Service</h4>
                  </div>
                  <div class="card-body">
                  
                   <h5 class = 'text-justify float-left' id = 'today_most_service'></h5>
                  </div>
                </div>
              </div>
            </div>
    
        <!---->
        <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Least Frequented Service</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left'  id = 'today_least_service'></h5>
                  </div>
                </div>
              </div>
            </div>
        <!---->    
    </div>
    
    <h5>This Week</h5>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                  @if(isset($today_requests))
                   {{ count((array)$today_requests) }}
                   @else
                   0
                   @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Service</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left' id = 'week_service'></h5>
                  </div>
                </div>
              </div>
            </div>
    
        <!---->
        <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Day</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left'  id = 'week_day'></h5>
                  </div>
                </div>
              </div>
            </div>
        <!---->    
    </div>
    <h5>This Month</h5>
    <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                  @if(isset($today_requests))
                   {{ count((array)$this_month_requests) }}
                   @else
                   0
                   @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Service</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left'  id = 'month_service'></h5>
                  </div>
                </div>
              </div>
            </div>
    
        <!---->
        <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Day</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left' id = 'month_day'></h5>
                  </div>
                </div>
              </div>
            </div>
        <!---->    
    </div>
    

    </div>
</div>

<script>
  sessionStorage.setItem('token', '{{ session("token") }}');
  sessionStorage.setItem('user_id', '{{ session("user_id") }}');
@if(Auth::user()->client)
  sessionStorage.setItem('client_id', '{{ Auth::user()->client->pluck("id")[0] }}');
@endif

</script>

@endsection



