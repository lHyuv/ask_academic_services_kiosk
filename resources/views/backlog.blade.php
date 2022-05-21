@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Backlogs and Queries</h1>
        </div>  
        </div>
      
</section>
    <div class="row">
        <div class="col-md-8">

            <div class="card mt-5">
                <div class="card-header"><h4>{{ now()->diffForHumans() }}</h4></div>

                <div class="card-body">
                    <ul class = "list-unstyled">
                    <li><a href = "#"> User</a> did this transaction.. </li> <hr>
                    <li><a href = "#"> User</a> did this transaction.. </li> <hr>
                    <li><a href = "#"> User</a> did this transaction.. </li>
                    </ul>
                </div>
            </div>
   
  <!--Continue on this card..-->
    

        <div class="card mt-5">
            <div class="card-header"><h4>{{ now()->diffForHumans() }}</h4></div>

            <div class="card-body">
                <ul class = "list-unstyled">
                <li><a href = "#"> User</a> did this transaction.. </li> <hr>
                <li><a href = "#"> User</a> did this transaction.. </li> <hr>
                <li><a href = "#"> User</a> did this transaction.. </li>
                </ul>
            </div>
        </div>
        </div>
  <!--Continue on this card..:end-->
         <!---->
         <div class="col-md-4">

            <div class="card mt-5">
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


