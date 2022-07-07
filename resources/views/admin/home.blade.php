@extends('layouts.header')

@section('page_title')
    {{ "Home" }}
@endsection


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

<!--Component 1--> 
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Today's Report</h5>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <p class="text-center">
                     <!-- <strong></strong> -->
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <h4 class="text-center" id = 'today_report_none' style = 'display:none;'><i>Nothing to show yet</i></h4>
                      <canvas class="chart" id="chart-1" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <p class="text-center">
                      <strong>Trends</strong>
                    </p>

                   
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                   @if(isset($today_requests))
                   {{ count($today_requests) }}
                   @foreach($today_requests as $r)
                   {{$r}}
                   @endforeach
                   @else
                   0
                   @endif

                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2 shadow-none border-0">
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
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2 shadow-none border-0">
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
                <!-- /.row -->
                </div>
                </div>
              </div>
              </div>
<!--Component 1:end--> 

<!--Component 2--> 
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">This Week's Report</h5>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">

                  <div class="col-md-5">
                    <p class="text-center">
                      <strong>Trends</strong>
                    </p>

                   
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                   @if(isset($week_requests))
                   {{ count($week_requests) }}
                   @else
                   0
                   @endif

                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
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
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
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
                
                <!-- /.row -->
                </div>
                <!----->
                <div class="col-md-7">
                    <p class="text-center">
                     <!-- <strong></strong> -->
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <h4 class="text-center" id = 'this_week_report_none' style = 'display:none;'><i>Nothing to show yet</i></h4>
                      <canvas class="chart" id="chart-2" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              </div>
<!--Component 2:end--> 


<!--Component 3--> 
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">This Month's Report</h5>

             
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <p class="text-center">
                     <!-- <strong></strong> -->
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <h4 class="text-center" id = 'this_month_report_none' style = 'display:none;'><i>Nothing to show yet</i></h4>
                      <canvas class="chart" id="chart-3" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <p class="text-center">
                      <strong>Trends</strong>
                    </p>

                   
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transactions</h4>
                  </div>
                  <div class="card-body">
                   @if(isset($month_requests))
                   {{ count($month_requests) }}
                   @else
                   0
                   @endif

                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Service</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left' id = 'month_service'></h5>
                  </div>
                </div>
              </div>
            </div>
    
        <!---->
        <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2  shadow-none border-0">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                  <h4>Most Frequented Day</h4>
                  </div>
                  <div class="card-body">
                  <h5 class = 'text-justify float-left'  id = 'month_day'></h5>
                  </div>
                </div>
              </div>
            </div>
        <!---->    
                </div>
                <!-- /.row -->
                </div>
                </div>
              </div>
              </div>
<!--Component 3:end--> 

    
    

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



