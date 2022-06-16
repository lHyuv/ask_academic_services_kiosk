@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
    
            <h1>Ongoing Services</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Ongoing Services</div>
            </div> 
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "ongoing_services" style = 'display:none;'>
                <div class="card-header"><h4>Process name</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-6">
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
                    <div class = "col-md-6">
                        <i>Some content here..</i>
                    </div>

                    </div>

                </div>
                <div class = "card-footer">
                <div class = "float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('ongoing_services','hide');">Close</button>
                
                    
                        </div>
                    </form>
                </div>
            </div>
   


         <!---->
       
<!--Hidden card:end-->

    <div class="row">
        <div class="col-md-12">

            <div class="card card-outline card-primary ">
                <div class="card-header"><h4>List of Services</h4></div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($submitted_requests as $req)
                            <tr>
                                <td>{{ $req->requests->request_type}}</td>
                                <td>
                                @if($req->request_status == 'Pending')
                                <span class="badge badge-info">Pending</span>
                                @elseif($req->request_status == 'Approved')
                                <span class="badge badge-success">Pending</span>
                                @else
                                <span class="badge badge-danger">Rejected</span>
                                @endif
                                </td>
                                <td>{{ $req->created_at->diffForHumans() }}</td>
                                <td>
                                    <button class = "btn btn-info" onclick = "notification('info','','Not yet done');//manageCard('ongoing_services','show');" >View Request</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
   

         <!---->
         

    </div>
</div>
<script>
$(document).ready(()=>{
    $('table').dataTable();
})
</script>
@endsection


