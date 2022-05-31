@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
     
            <h1>Services and Requests</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Pending Services</div>
            </div> 
        </div>
      
</section>
<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "ongoing_services" style = 'display:none;'>
                <div class="card-header"><h4>Process name</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-8">
                    <form action="" method = "">
                        <div class="form-group">
                        <label>Request details</label>
                        <textarea name="" id="" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Requirement 1</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <div class="form-group">
                        <label>Requirement 2</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name = "" id = "" class = "form-control" required/>
                        </div>
 
                    </div>
                    <!---->
                    <div class = "col-md-4">
                        <i>Some content here..</i>
                    </div>

                    </div>

                </div>
                <div class = "card-footer">
                <div class = "float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('ongoing_services','hide');">Close</button>
                        <button class = "btn btn-danger"  data-bs-toggle = "modal" data-bs-target="#confirmModal"  >Disapprove</button>
                        <button class = "btn btn-primary"  data-bs-toggle = "modal" data-bs-target="#confirmModal" >Approve</button>
                        </div>
                    </form>
                </div>
            </div>
   


         <!---->
       
<!--Hidden card:end-->
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
                                    <button class = "btn btn-info"   onclick = "manageCard('ongoing_services','show');">View Request</button>
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
                                    <button class = "btn btn-info"   onclick = "manageCard('ongoing_services','show');">View Request</button>
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


