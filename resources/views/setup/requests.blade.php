@extends('layouts.header')

@section('page_title')
    {{ "Requests" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Requests</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Requests</div>
            </div> 
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_request_crud" style = 'display:none;'>
                <div class="card-header"><h4>Request details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = 'edit_request'  enctype="multipart/form-data">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type</label>
                        <input type="text" name = "request_type" id = "edit_type" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>

                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Icon / Picture</label>
                        <input class="form-control" type="file" id="edit_file" name="file" accept="image/*" onchange="showImg(this.files[0])" >
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <img src="{{ URL::to('/') }}/template/img/example-image.jpg"class="img-fluid mb-2" 
                        style="object-fit: cover;" 
                        id="placeholder" name="placeholder">
                        </div>
                        </div>
                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('edit_request_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->

         <div class="card card-outline card-primary mt-5" id = "create_request_crud" style = 'display:none;'>
                <div class="card-header"><h4>Request details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_request" name = "create_request" enctype="multipart/form-data">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="text" name = "request_type" id = "create_type" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Icon / Picture &nbsp;<code class = 'text-danger'>*</code></label>
                        <input class="form-control" type="file" id="create_file" name="file" accept="image/*" >
                        </div>
                        </div>

                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" type = "button" onclick = "manageCard('create_request_crud','hide');" >Cancel</button>
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

            <div class="card card-outline card-primary " id = 'create_role_crud'>
                <div class="card-header">
                <div class = "col-md-10">
                    <h4>List of Requests</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_request_crud','show');createRequest();">+ Add</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                            <th><label id = 'checkbox_label' style = 'display:none;'>Delete</label></th>
                                <th>Type/Name</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                        <tr>
                                <td><input type="checkbox" value = "{{ $request->id }}"> </td>
                                <td>{{ $request->request_type }}</td>
                                <td>{{ date('F j, Y', strtotime($request->created_at)) }}</td>
                                <td>
                             
                                @if($request->status == '1')
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
                                
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_request_crud','show');editRequest(' {{$request}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-pen mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" onclick = "deleteRequest(' {{$request}}');" >
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
    $("table").dataTable({
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
                                        deleteRequestChecked();
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


