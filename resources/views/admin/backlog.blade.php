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
        <div class="col-md-8">




    
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
                        <h5 id = 'query_text'></h5>
                        </div>           
                    </div>
                    </div>
                    <h4 id = "card_title">List of created requests</h4>
        
                </div>
      
                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Student Number</th>
                                <th>Transaction</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($submitted_requests as $r)
                        <tr>
                        <td>
                        @if($r->student_number != 'N/A' || $r->student_number != null)
                        <a href = "#"> User</a>
                        @else 
                        {{ $r->student_number }}
                        @endif
                        </td>
                        <td>
                        {{ $r->requests()->pluck('request_type')[0]}}
                        </td>
                        <td>
                        {{ date('d-M-y', strtotime($r->created_at))}}
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
       
         <!---->
         <div class="col-md-4">

            <div class="card card-outline card-primary mt-3" id = 'query'>
                <div class="card-header"><h4>Queries</h4></div>

                <div class="card-body">
                    <h5>Sort By</h5>
                    <form>
                        <label>By Service</label>
                        <select class = 'form-control' id='requests' onchange = 'selectRequest($("#requests").val());'>
                            <option value = "All"> All </option>
                            @foreach($requests as $req)
                            <option value = "{{ $req->id }}"> {{ $req->request_type }}</option>
                            @endforeach
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
                    </form>
                </div>
            </div>
        </div>
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
                                }
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


