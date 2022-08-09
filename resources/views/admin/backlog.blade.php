@extends('layouts.header')

@section('page_title')
    {{ "Backlogs and Queries" }}
@endsection

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

    <div class="row" id = "backlog_table">
        <div class="col-md-9">




    
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
                    <div class = "row">
                        <div class = "col-md-12">
                        <h4 class = "mt-4">List of created requests</h4> <br>
                        <span id = 'query_text'></span>
                        </div>           
                    </div>
                    </div>
                    <h4 id = "card_title">List of created requests</h4>
        
                </div>
      
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
                         && ($r->ticket_status != 'Completed' && $r->ticket_status != 'Cancelled' ))
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
            </div>

        </div>
       
         <!---->
         <div class="col-md-3">

            <div class="card card-outline card-primary mt-3" id = 'query'>
                <div class="card-header"><h4>Queries</h4></div>

                <div class="card-body">
                    <h5>Sort By</h5>
                    <form>
                        <label>By Service</label>
                        <select class = 'form-control' id='requests' onchange = 'selectRequest(this.value);'>
                            <option value = "All"> All </option>
                            @foreach($requests as $req)
                            <option value = "{{ $req->id }}"> {{ $req->request_type }}</option>
                            @endforeach
                        </select>
                        <label>By Status</label>
                        <select class = 'form-control' id='statuses' onchange = 'selectStatus(this.value);'>
                            <option value = "All"> All </option>
                            <option value = "Pending"> Pending</option>
                            <option value = "Completed"> Completed</option>
                            <option value = "Cancelled"> Cancelled</option>
                            <option value = "Void"> Void</option>
                        </select>
                        <label>Date from</label>
                        <input type = 'date' class = 'form-control' id = 'date_from' onchange = '
                        $("#date_to").css("display","block");
                        $("#date_to_label").css("display","block");
                        '/>
                        <label id = "date_to_label" style = "display:none;" >Date to</label>
                        <input type = 'date' class = 'form-control' id = 'date_to' onchange = '
                        selectRange(); 
                        $("#date_to").css("display","none");
                        $("#date_to_label").css("display","none");
                        ' style = "display:none;"/>


                        <label>By Month</label>
                        <select class = 'form-control' id = 'month' onchange = 'selectMonth();'>
                            
                        </select>
                        <label>By Day</label>
                        <input type="date" class  ='form-control' id = 'date' onchange = 'selectDay();'>

                        <label>By Student Number</label>
                        <select name="student_no" id="student_no" class = "form-control" onchange = 'selectUser();'>
                            <option selected value = "All">All</option>
                        </select>

                        <label>Reports</label>
                        <select name="report" id="report" class = "form-control" onchange = 'selectReport();'>
                            <option selected value = "All">All</option>
                            <option value = "Weekly">This Week/Weekly</option>
                            <option value = "Monthly">This Month/Monthly</option>
                        </select>
                        <label>By Program</label>
                        <select class = 'form-control' id='programs' onchange = 'selectProgram(this.value);'>
                            <option value = "All"> All </option>

                        </select>
                    </form>
                </div>
            </div>
        </div>
         <!---->

    </div>
</div>
<script>
 $(document).ready(()=>{
    let groupColumn = 4;
    $("table").DataTable({
        "responsive": true, "lengthChange": false,	//"autoWidth":  false,
        "dom": 'Bfrtip',
   
            "columnDefs": [
              { "visible": false, "targets": groupColumn,  }
             ],
             "order": [[groupColumn, 'asc']],
            "drawCallback": function ( settings ) {
              var api = this.api();
              var rows = api.rows( {page:'current'} ).nodes();
              var last=null;
   
              api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                  if ( last !== group ) {
                      $(rows).eq( i ).before(
                          '<tr class="group"><td colspan="6"><b class = "text-primary">'+group+'</b></td></tr>'
                      );
   
                      last = group;
                  }
              } );
          },
          
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
                      ],
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


