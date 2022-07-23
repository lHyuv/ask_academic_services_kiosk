@extends('layouts.header')

@section('page_title')
    {{ "Forms" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Forms</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Forms</div>
            </div> 
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_form_crud" style = "display:none;">
                <div class="card-header"><h4>Form details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = 'edit_form'  enctype="multipart/form-data">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Form Name</label>
                        <input type="text" name = "form_name" id = "edit_form_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type</label>
                        <select name="request_id" id="edit_type" class = "form-control">
                            <option value = "" selected disabled>Select request..</option>
                            @foreach($requests as $request)
                            <option value="{{ $request->id }}">{{ $request->request_type}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>

                        
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>File</label>
                        <input class="form-control" type="file" id="edit_file" name="file"  onchange="showFile(this.files[0])"
                        accept=".txt, .pdf,  application/pdf, image/*"  >
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Source</label>
                        <input type="text" name = "source" id = "edit_source" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <!-----> 
                        <div class = "col-md-12">
                        <div class="form-group">
                        <iframe src="{{ URL::to('/') }}/template/img/example-image.jpg"
                        height="500px" width="80%"
                       
                        id="placeholder" name="placeholder"></iframe>
                        </div>
                        </div>
                 
                        <!-----> 
                        </div>
                        <div class="float-right">
                        <button  type = "button"  class = "btn btn-secondary" onclick = "manageCard('edit_form_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->
         <div class="card card-outline card-primary mt-5" id = "create_form_crud" style = "display:none;">
                <div class="card-header"><h4>Form details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = 'create_form'  enctype="multipart/form-data">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Form Name</label>
                        <input type="text" name = "form_name" id = "create_form_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Request Type</label>
                        <select name="request_id" id="create_type" class = "form-control">
                            <option value = "" selected disabled>Select request..</option>
                            @foreach($requests as $request)
                            <option value="{{ $request->id }}">{{ $request->request_type}}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>

                        
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>File</label>
                        <input class="form-control" type="file" id="create_file" name="file"
                         accept=".txt, .pdf, application/pdf, image/*"  >
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Source</label>
                        <input type="text" name = "source" id = "create_source" class = "form-control" placeholder = ""/>
                        </div>
                        </div>


                        </div>
                        <div class="float-right">
                        <button type = "button" class = "btn btn-secondary" onclick = "manageCard('create_form_crud','hide');" >Cancel</button>
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

            <div class="card card-outline card-primary " id = 'create_form_crud'>
                <div class="card-header">
                <div class = "col-md-10">
                    <h4>List of Forms</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_form_crud','show');createForm();">+ Add</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Name</th>
                                <th>Request</th>
                                <th>Source</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($forms as $form)
                        <tr>
                                <td><input type="checkbox" value = "{{ $form->id }}"> </td>
                                <td>{{ $form->form_name }}</td>
                                <td>
                               
                                @if(count($form->requests()->pluck('request_type')) > 0)
                                {{ $form->requests()->pluck('request_type')[0] }}
                                @else
                                <i>Not Available</i>
                                @endif    
                                </td>
                                <td>
                             
                                @if($form->source == NULL || $form->source == null || $form->source == 'null')
                                 <i>Not Available</i>
                                @else
                               {{ $form->source }}
                                @endif
                                </td>
                                <td>
                             
                                @if($form->status == '1')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                                </td>
                                <td>
                                @if($form->created_at == NULL || $form->created_at == null || $form->created_at == 'null')
                                 <i>Not Available</i>
                                @else
                                {{ $form->created_at->diffForHumans() }}
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
                                
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_form_crud','show');editForm(' {{$form}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" onclick = "deleteForm('{{$form}}');">
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
                                text: 'Delete Checked',
                                action: function ( e, dt, node, config ) {
                                    deleteFormChecked();
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


