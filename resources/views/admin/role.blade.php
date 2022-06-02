@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Roles</h1>
        </div>  
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_role_crud" style = 'display:none;'>
                <div class="card-header"><h4>User type details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = 'edit_role'>

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>User Type</label>
                        <input type="text" name = "user_type_name" id = "edit_user_type_name" class = "form-control" placeholder = "" required/>
                        </div>
                        <div class="form-group">
                        <label>Details</label>
                        <textarea name="edit_details" id="edit_details" rows="10" class = "form-control"> </textarea>
                        </div>
                        </div>

                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('edit_role_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->

         <div class="card card-outline card-primary mt-5" id = "create_role_crud" style = 'display:none;'>
                <div class="card-header"><h4>User type details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_role">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>User Type</label>
                        <input type="text" name = "create_user_type_name" id = "create_user_type_name" class = "form-control" placeholder = "" required/>
                        </div>
                        <div class="form-group">
                        <label>Details</label>
                        <textarea name="create_details" id="create_details" rows="10" class = "form-control"> </textarea>
                        </div>
                        </div>

                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "manageCard('create_role_crud','hide');" >Cancel</button>
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
                    <h4>List of Roles</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_role_crud','show');createRole();">+ Add</button>
                    </div>
                </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->created_at->diffForHumans() }}</td>
                                <td>
                             
                                @if($role->status == '1')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                                </td>
                    
                                <td>
                                   
                                    <div class="text-center dropdown">
                                    <!-- Dropdown Toggler --> 
                                    <div class="btn btn-sm btn-default" data-bs-toggle="dropdown" role="button">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </div>

                                    <!-- Dropdown Menu --> 
                                    <div class="dropdown-menu dropdown-menu-right"> 
                                
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_role_crud','show');editRole(' {{$role}}');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button" onclick = "deleteRole(' {{$role}}');"  data-bs-toggle = "modal" data-bs-target="#confirmModal">
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
    $('table').DataTable();
})
</script>
@endsection


