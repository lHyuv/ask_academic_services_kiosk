@extends('layouts.header')

@section('page_title')
    {{ "Steps" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Steps</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Steps</div>
            </div> 
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_step_crud" style = 'display:none;'>
                <div class="card-header"><h4>Step details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = 'edit_step'>

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type</label>
                        <select name="edit_type" id="edit_type" class = "form-control">
                            <option value = "" selected required>Select request..</option>
                            @foreach($requests as $request)
                            <option value="{{ $request->id }}">{{ $request->request_type}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Step number</label>
                        <input type="number" name = "edit_step_no" id = "edit_step_no" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Step name</label>
                        <input type="text" name = "edit_step_name" id = "edit_step_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('edit_step_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->

         <div class="card card-outline card-primary mt-5" id = "create_step_crud" style = 'display:none;'>
                <div class="card-header"><h4>Step details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_step">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type</label>
                        <select name="create_type" id="create_type" class = "form-control">
                        <option value = "" selected required>Select request..</option>
                            @foreach($requests as $request)
                            <option value="{{ $request->id }}">{{ $request->request_type}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Step number</label>
                        <input type="number" name = "create_step_no" id = "create_step_no" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Step name</label>
                        <input type="text" name = "create_step_name" id = "create_step_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>

                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" type="button" onclick = "manageCard('create_step_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Create</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->
       
<!--Hidden card:end-->

    <div class="row">
        <div class="col-md-12">

            <div class="card card-outline card-primary " id = 'create_step_crud'>
                <div class="card-header">
                <div class = "col-md-10">
                    <h4>List of Steps</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_step_crud','show');createStep();">+ Add</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Request</th>
                                <th>Step No</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($steps as $step)
                        <tr>
                                <td><input type="checkbox" value = "{{ $step->id }}"> </td>
                                <td>{{ $step->requests()->pluck('request_type')[0] }}</td>
                                <td>{{ $step->step_number }}</td>
                                <td>{{ $step->step_name }}</td>
                                <td>{{ $step->created_at->diffForHumans() }}</td>
                                <td>
                             
                                @if($step->status == '1')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                                </td>
                    
                                <td>
                                   
                                    <div class="text-center dropdown">
                                    <!-- Dropdown Toggler --> 
                                    <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </div>

                                    <!-- Dropdown Menu --> 
                                    <div class="dropdown-menu dropdown-menu-right"> 
                                
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_step_crud','show');editStep(' {{$step}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" onclick = "deleteStep(' {{$step}}');" >
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>Delete</div>
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
                                text: 'Delete Checked',
                                action: function ( e, dt, node, config ) {
                                    deleteStepChecked();
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


