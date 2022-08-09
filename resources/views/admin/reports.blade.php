@extends('layouts.header')

@section('page_title')
    {{ "Requests" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">

            <h1> Reports </h1> 
         
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item"> Reports</div>
         
            </div> 
        </div>
      
</section>
<div class="row custom_widget">
        <div class="col-md-4">

            <div class="card mt-4">
                <div class="card-header"><h4>Total</h4></div>

                <div class="card-body">
                  <h3 id = 'all_widget'>  {{count($submitted_requests)}} </h3>
                </div>
            </div>
        </div>
        
<div class="col-md-4">

<div class="card mt-4">
    <div class="card-header"><h4>Pending</h4></div>

    <div class="card-body">
      <h3 id = 'pending_widget'>  {{$pending}} </h3>
    </div>
</div>
</div>

<div class="col-md-4">

<div class="card mt-4">
    <div class="card-header"><h4>Completed</h4></div>

    <div class="card-body">
      <h3 id = 'completed_widget'>  {{$completed}} </h3>
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
                        <h4 class = "mt-4">List of created requests</h4> <br>
                        <span id = 'query_text'></span>
                        </div>           
                    </div>
                    </div>
                    <h4 id = "card_title">List of created  requests</h4>
        
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
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-4">
                        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                 <li class="nav-item">
                                    <a class="nav-link active" id="" data-toggle="tab"
                                     href="javascript:void(0);" role="tab" 
                                     onclick = "loadReportTable('All');"
                                     aria-selected="true">All</a>
                                </li>
                            @foreach($requests as $key=>$r)
                        
                                <li class="nav-item">
                                    <a class="nav-link" id="" data-toggle="tab"
                                     href="javascript:void(0);" role="tab" 
                                     onclick = "loadReportTable('{{$r->id}}');"
                                     aria-selected="true">{{$r->request_type}}</a>
                                </li>
                         

                            @endforeach

                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-8">
                        <div class="tab-content no-padding" id="myTab2Content">
                          <div class="tab-pane fade show active" id="home4" role="tabpanel">
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
                         && ($r->ticket_status != 'Completed' && $r->ticket_status != 'Cancelled' ))
                         || $r->ticket_status == 'N/A' || $r->ticket_status == 'Void' || $r->ticket_status == 'void')
                        Void
                        @elseif($r->ticket_status == 'Cancelled' || $r->ticket_status == 'cancelled') 
                       Cancelled
                        @elseif($r->ticket_status == 'Completed' || $r->ticket_status == 'completed') 
                        Completed
                        @else
                       Pending
                        @endif
                    
                       
                    
                     
                        </td>
                        <td>
                        {{ date('F j Y (l)', strtotime($r->created_at))}}
                        </td>
                        <td>
                        <div class="text-center dropdown">
                                    <!-- Dropdown Toggler --> 
                                    <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </div>

                                     <!-- Dropdown Menu --> 
                                     <div class="dropdown-menu dropdown-menu-right"> 
                                    @if(is_null($r->ticket_status ) || 
                                    (date('F j, Y', strtotime($r->created_at)) != date('F j, Y', strtotime(now())))
                        
                         || $r->ticket_status == 'N/A' || $r->ticket_status == 'Void' || 
                         $r->ticket_status == 'void' ||  $r->ticket_status == 'Cancelled' ||  $r->ticket_status == 'Completed')
                                    <div class="dropdown-item d-flex" role="button" onclick = "setStatus('{{$r->id}}');">
                                    <div style="width: 2rem">
                          
                                    </div>
                                    <div>No action available </div>
                                    </div>
                        @else 
                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('{{$r->id}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-edit mr-1"></i>
                                    </div>
                                    <div>Set Status</div>
                                    </div>
                        @endif 
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

                
               

       
       
         <!---->
        
         <!---->

    </div>
</div>

<script>
     let groupColumn2 = 3;
 $(document).ready(()=>{
    $("table").DataTable({
        "responsive": true, "lengthChange": false,	//"autoWidth":  false,
        "dom": 'Bfrtip',
        "columnDefs": [
              { "visible": false, "targets": groupColumn2,  }
             ],

            "drawCallback": function ( settings ) {
              var api = this.api();
              var rows = api.rows( {page:'current'} ).nodes();
              var last=null;
   
              api.column(groupColumn2, {page:'current'} ).data().each( function ( group, i ) {
                  if ( last !== group ) {
                      $(rows).eq( i ).before(
                          '<tr class="group"><td colspan="6"><b class = "text-primary">'+group+'</b></td></tr>'
                      );
   
                      last = group;
                  }
              } );
          },
          "order": [[groupColumn2, 'asc']],
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


