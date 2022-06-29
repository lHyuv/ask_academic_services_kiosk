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




    
    <div class="card card-primary mt-5">

                <div class="card-header"><h4>List of created requests</h4></div>
      
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

            <div class="card card-outline card-primary mt-5">
                <div class="card-header"><h4>Queries</h4></div>

                <div class="card-body">
                    <h5>Sort By</h5>
                    <form>
                        <label>By Service</label>
                        <select class = 'form-control' id='requests' onchange = 'selectRequest($("#requests").val());'>
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
    $('table').dataTable();
</script>
@endsection


