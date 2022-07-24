@extends('layouts.header')

@section('page_title')
    {{ "User Roles" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>User Roles</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">User Roles</div>
            </div> 
        </div>
      
</section>



         <!---->

         <div class="card card-outline card-primary mt-5" id = "create_userrole_crud" style = 'display:none;'>
                <div class="card-header"><h4>User role details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_userrole">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>User</label>
                        <select name="create_user" id="create_user" class = "form-control">
                            @foreach($users as $user)
                            <option value="{{ $user->id}}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>User Type</label>
                        <select name="create_role" id="create_role" class = "form-control">
                            @foreach($roles as $role)
                            <option value="{{ $role->id}}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        </div>
                        </div>

                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" type = "button" onclick = "manageCard('create_userrole_crud','hide');" >Cancel</button>
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

            <div class="card card-outline card-primary " id = 'create_userrole_crud'>
                <div class="card-header">
                <div class = "col-md-10">
                    <h4>List of User Roles</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_userrole_crud','show');createUserRole();">+ Add</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($userroles as $userrole)
                        <tr>
                                <td>{{ $userrole->user()->pluck('email')[0] }}</td>
                                <td>{{ $userrole->role()->pluck('name')[0] }}</td>
                                <td>{{ $userrole->created_at->diffForHumans() }}</td>
                                <td>
                             
                                @if($userrole->status == '1')
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
                                    @if($userrole->user_id == Auth::user()->id)
                                    <!----> 
                              
                                     <div class="dropdown-item d-flex" role="button" onclick = "" >
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>&nbsp; No action provided</div>
                                    </div> 
                                    <!----> 

                                    @else
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_userrole_crud','show');editUserRole(' {{$userrole}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-pen mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" onclick = "deleteUserRole(' {{$userrole}}');" >
                                    <div style="width: 2rem">
                                    <i class="fas fa-trash mr-1"></i>
                                    </div>
                                    <div>Delete</div>
                                    </div> 
                                    <!----> 
                                    @endif
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


