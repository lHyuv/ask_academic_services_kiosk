@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        
            <h1>Backlogs and Queries</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Backlogs and Queries</div>
            </div> 
        </div>
      
</section>
    <div class="row">
        <div class="col-md-8">



    @foreach($submitted_requests as $key=>$req)
    
    <div class="card card-primary mt-5">
            @if( date('d-M-y', strtotime($req[0]->created_at)) ==  date('d-M-y', strtotime(now())))
                <div class="card-header"><h4>Today</h4></div>
            @elseif( date('d-M-y', strtotime($req[0]->created_at)) ==  date('d-M-y', strtotime(now()->subDays(1))))
                <div class="card-header"><h4>Yesterday</h4></div>
            @else
                <div class="card-header"><h4>{{ date('d-M-y', strtotime($req[0]->created_at)) }}</h4></div>
            @endif
                <div class="card-body">
                    <ul class = "list-unstyled">
                        @foreach($req as $r)
                        @if($r->student_number != 'N/A')
                        <li><i class = 'fas fa-user'></i> User<a href = "#">  {{ $r->student_number }}</a> opted for {{ $r->requests()->pluck('request_type')[0] }}</li> <hr>
                        @else
                        <li><i class = 'fas fa-user'></i> A<a href = "#"> user</a> opted for {{ $r->requests()->pluck('request_type')[0]}}</li> <hr>
                        @endif

                        @endforeach
                    </ul>
                </div>
            </div>
    @endforeach
        </div>

         <!---->
         <div class="col-md-4">

            <div class="card card-outline card-primary mt-5">
                <div class="card-header"><h4>Queries</h4></div>

                <div class="card-body">
                    <h5>Sort By</h5>
                    <form>
                        <label>Date from</label>
                        <input type = 'date' class = 'form-control' />
                        <label>Date to</label>
                        <input type = 'date' class = 'form-control' />
                        <label>By User</label>
                        <select class = 'form-control'>
                            <option value = ''>...</option>
                        </select>
                        <label>By Service</label>
                        <select class = 'form-control'>
                            <option value = ''>...</option>
                        </select>
                        <label>By Month</label>
                        <select class = 'form-control'>
                            <option value = ''>...</option>
                        </select>
                        <label>By Day</label>
                        <select class = 'form-control'>
                            <option value = ''>...</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
         <!---->

    </div>
</div>
@endsection


