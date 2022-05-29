@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Services and Requests</h1>
        </div>  
        </div>
      
</section>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header"><h4>Pending Services</h4></div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Overload</td>
                                <td>User 1</td>
                                <td>
                                <span class="badge badge-warning">Pending</span>
                                </td>
                                <td>{{ now()->diffForHumans() }}</td>
                                <td>
                                    <button class = "btn btn-info" >View Request</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Overload</td>
                                <td>User 2</td>
                                <td>
                                <span class="badge badge-danger">Overdue</span>
                                </td>
                                <td>{{ now()->diffForHumans() }}</td>
                                <td>
                                    <button class = "btn btn-info" >View Request</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
   

         <!---->
         

    </div>
</div>
<script>
$(document).ready(()=>{
    $('table').DataTable();
})
</script>
@endsection


