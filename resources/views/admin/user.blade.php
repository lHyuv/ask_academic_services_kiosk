@extends('layouts.header')

@section('page_title')
    {{ "Users" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Users</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Users</div>
            </div> 
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_user_crud" style = 'display:none;'>
                <div class="card-header"><h4>Profile details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "edit_user">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" />
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                        <hr>
                        <label>User Info</label>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="text" name = "edit_email" id = "edit_email" class = "form-control" placeholder = ""/>
                        </div>

                        <label>Change Password</label>
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" name = "edit_password" id = "edit_password" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name = "edit_password_confirm" id = "edit_password_confirm" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('edit_user_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->
       
         <div class="card card-outline card-primary mt-5" id = "create_user_crud" style = 'display:none;'>
                <div class="card-header"><h4>Profile details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_user">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                        <hr>
                        <label>User Info</label>
                        <div class="form-group">
                        <label>Email &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="text" name = "create_email" id = "create_email" class = "form-control" placeholder = ""/>
                        </div>
                      
                       
                        <div class="form-group">
                        <label>Password &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="password" name = "create_password" id = "create_password" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>Confirm password &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="password"  name = "create_password_confirm" id = "create_password_confirm"  class = "form-control" placeholder = ""/>
                        </div>
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('create_user_crud','hide');" >Cancel</button>
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

            <div class="card card-outline card-primary ">
                <div class="card-header">
                    <div class = "col-md-10">
                    <h4>List of Users</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_user_crud','show');createUser();">+ Add</button>
                    </div>
                 </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ date('F j, Y', strtotime($user->created_at))  }}</td>
                                <td>
                             
                                @if($user->status == '1')
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
                                    @if($user->id == Auth::user()->id)
                                    <!----> 
                              
                                     <div class="dropdown-item d-flex" role="button" onclick = "" >
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>&nbsp; No action provided</div>
                                    </div> 
                                    <!----> 

                                    @else
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_user_crud','show');editUser('{{ $user }}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-pen mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" >
                                    <div style="width: 2rem">
                                    <i class="fas fa-trash mr-1"></i>
                                    </div>
                                    <div>Delete</div>
                                    </div> 
                                    <!---->
                                    @endif
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


