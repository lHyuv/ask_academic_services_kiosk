@extends('layouts.header')

@section('page_title')
    {{ "Requirements" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Requirements</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Requirements</div>
            </div> 
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_requirement_crud" style = 'display:none;'>
                <div class="card-header"><h4>Requirement details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = 'edit_requirement'>

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type</label>
                        <select name="edit_type" id="edit_type" class = "form-control">
                            <option value = "" selected>Select request..</option>
                            @foreach($requests as $request)
                            <option value="{{ $request->id }}">{{ $request->request_type}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Name</label>
                        <input type="text" name = "edit_req_name" id = "edit_req_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Where to get</label>
                        <input type="text" name = "edit_req_source" id = "edit_req_source" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('edit_requirement_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->

         <div class="card card-outline card-primary mt-5" id = "create_requirement_crud" style = 'display:none;'>
                <div class="card-header"><h4>Requirement details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_requirement">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type &nbsp;<code class = 'text-danger'>*</code></label>
                        <select name="create_type" id="create_type" class = "form-control">
                        <option value = "" selected>Select request..</option>
                            @foreach($requests as $request)
                            <option value="{{ $request->id }}">{{ $request->request_type}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Name &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="text" name = "create_req_name" id = "create_req_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Where to get</label>
                        <input type="text" name = "create_req_source" id = "create_req_source" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" type="button" onclick = "manageCard('create_requirement_crud','hide');" >Cancel</button>
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

            <div class="card card-outline card-primary " id = 'create_requirement_crud'>
                <div class="card-header">
                <div class = "col-md-10">
                    <h4>List of requirements</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_requirement_crud','show');createRequirement();">+ Add</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                            <th><label id = 'checkbox_label' style = 'display:none;'>Delete</label></th>
                                <th>Request</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($requirements as $requirement)
                        <tr>
                                <td><input type="checkbox" value = "{{ $requirement->id }}"> </td>
                                <td>{{ $requirement->requests()->pluck('request_type')[0] }}</td>
                                <td>{{ $requirement->requirement_name }}</td>
                                <td>{{ date('F j, Y', strtotime($requirement->created_at)) }}</td>
                                <td>
                             
                                @if($requirement->status == '1')
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
                                
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_requirement_crud','show');editRequirement(' {{$requirement}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-pen mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" onclick = "deleteRequirement(' {{$requirement}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-trash mr-1"></i>
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
    $('input[type=checkbox]').css('display','none');
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
                                text: 'View Checkbox',
                                action: function ( e, dt, node, config ) {
                                    $('#checkbox_label').css('display','flex');
                                    $('input[type=checkbox]').css('display','flex');
                                }
                          },
                          {
                                text: 'Delete Checked',
                                action: function ( e, dt, node, config ) {
                                   
                                    $('#checkbox_label').css('display','flex');
                                    $('input[type=checkbox]').css('display','flex');
                                    if($('input[type=checkbox]').is(":checked") == true){
                                        deleteReqChecked();
                                    }else{
                                        Swal.fire({
                                        title: 'No checkbox selected yet',
                                        icon: 'info',
                                        showConfirmButton: true,
   

                                    })
                                    }
                                 
                                }
                          },
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


