@extends('layouts.header')

@section('page_title')
    {{ "Requests" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
            @if(count($submitted_requests) > 0)
            <h1>{{ $submitted_requests[0]->requests()->pluck('request_type')[0] }} Requests</h1>
            @else 
            <h1> Requests </h1> 
            @endif
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              @if(count($submitted_requests) > 0)
              <div class="breadcrumb-item">{{ $submitted_requests[0]->requests()->pluck('request_type')[0] }} Requests</div>
              @else 
              <div class="breadcrumb-item"> Requests</div>
              @endif
            </div> 
        </div>
      
</section>
<div class="row custom_widget">
        <div class="col-md-4">

            <div class="card mt-4">
                <div class="card-header"><h4>Total</h4></div>

                <div class="card-body">
                  <h3>  {{count($submitted_requests)}} </h3>
                </div>
            </div>
        </div>
        
<div class="col-md-4">

<div class="card mt-4">
    <div class="card-header"><h4>Pending</h4></div>

    <div class="card-body">
      <h3>  {{$pending}} </h3>
    </div>
</div>
</div>

<div class="col-md-4">

<div class="card mt-4">
    <div class="card-header"><h4>Completed</h4></div>

    <div class="card-body">
      <h3>  {{$completed}} </h3>
    </div>
</div>
</div>
</div>
    <div class="row" id = "backlog_table">
        <div class="col-md-12">




    
    <div class="card card-primary mt-3">

                <div class="card-header">
                    <div  id = "backlog_header" style = "display:none;">
                    <div class = "row">
                        <div class = "col-md-2">
                    <img src="https://cdn.pup.edu.ph/img/symbols/logo88x88.png" alt="logo" width="70" class="shadow-light rounded-circle">
                    </div>
                    <div class = "col-md-10">
                    <h3 class = "ml-3 mt-3">Academic Services</h3> 

                    </div>

                 
                    </div>
                    @if(count($submitted_requests) > 0)
                    <div class = "row">
                        <div class = "col-md-12">
                        <h4 class = "mt-4">List of created {{ $submitted_requests[0]->requests()->pluck('request_type')[0] }} requests</h4> <br>
                        <span id = 'query_text'></span>
                        </div>           
                    </div>
                    </div>
                    <h4 id = "card_title">List of created {{ $submitted_requests[0]->requests()->pluck('request_type')[0] }}  requests</h4>
        
                </div>
                @else 
                <div class = "row">
                        <div class = "col-md-12">
                        <h4 class = "mt-4">List of created requests</h4> <br>
                        <span id = 'query_text'></span>
                        </div>           
                    </div>
                    </div>
                    <h4 id = "card_title">List of created requests</h4>
        
                </div>
                @endif
      
                <div class="card-body">
                    <hr style = 'display:none;'>
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Ticket No</th>
                                <th>Student Number</th>
                                <th>Transaction</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($submitted_requests as $r)
                        <tr>
                        <td>
                        @if(is_null($r->reference_number) || $r->reference_number == 'N/A')
                        <a href = "#"> No code available</a>
                        @else 
                        {{ $r->reference_number }}
                        @endif
                        </td>
                        <td>
                        @if(is_null($r->student_number) || $r->student_number == 'N/A')
                        <a href = "#"> User</a>
                        @else 
                        {{ $r->student_number }}
                        @endif
                        </td>
                        <td>
                        {{ $r->requests()->pluck('request_type')[0]}}
                        </td>
                        <td>   
                        @if(is_null($r->ticket_status ) || (date('F j, Y', strtotime($r->created_at)) != date('F j, Y', strtotime(now()))
                         && ($r->ticket_status != 'Completed' || $r->ticket_status != 'Cancelled' ))
                         || $r->ticket_status == 'N/A' || $r->ticket_status == 'Void' || $r->ticket_status == 'void')
                        <span class="badge badge-danger">Void</span>
                        @elseif($r->ticket_status == 'Cancelled' || $r->ticket_status == 'cancelled') 
                        <span class="badge badge-secondary">Cancelled</span>
                        @elseif($r->ticket_status == 'Completed' || $r->ticket_status == 'completed') 
                        <span class="badge badge-success">Completed</span>
                        @else
                        <span class="badge badge-info">Pending</span>
                        @endif
                    
                       
                    
                     
                        </td>
                        <td>
                        {{ date('d-M-y', strtotime($r->created_at))}}
                        </td>
                        <td>
                        <div class="text-center dropdown">
                                    <!-- Dropdown Toggler --> 
                                    <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </div>

                                    <!-- Dropdown Menu --> 
                                    <div class="dropdown-menu dropdown-menu-right"> 

                                    <div class="dropdown-item d-flex" role="button" onclick = "setStatus('{{$r->id}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-edit mr-1"></i>
                                    </div>
                                    <div>Set Status</div>
                                    </div> 
                                    <!----> 
                                    </div>

                                    </div>
                                </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
       
         <!---->
        
         <!---->

    </div>
</div>
<script>
 $(document).ready(()=>{
    $("table").DataTable({
        "responsive": true, "lengthChange": false,	//"autoWidth":  false,
        "dom": 'Bfrtip',
    
                 "buttons": [
        
                  {
                      extend: 'collection',
                      text: 'Options',
                      buttons: [
                          'copy',
                          'excel',
                          'csv',
                          'pdf',
                          'print',
                          {
                                text: 'Print Report',
                                action: function ( e, dt, node, config ) {
                                    printReport();
                                },
                                columnDefs: [{
                                targets: -1,
                                visible: false,
                                }],
                          }
                      ]
                  }
                ],
    });
})
//catch datatable ini error
$.fn.dataTable.ext.errMode = ( settings, help, msg ) => { 
    console.log(msg);
};

</script>
@endsection


