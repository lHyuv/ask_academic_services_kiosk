@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Users</h1>
        </div>  
        </div>
      
</section>

<!--Hidden card--> 
<div class="card card-outline card-primary mt-5" id = "edit_user_crud" style = 'display:none;'>
                <div class="card-header"><h4>Profile details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" required/>
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
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Signature link (optional)</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                        <hr>
                        <label>User Info</label>
                        <div class="form-group">
                        <label>Username</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>User Type/Role</label>
                        <select class = "form-control">
                            @foreach($roles as $role)
                            <option value = "{{ $role->id }}"> {{ $role->user_type_name }} </option>
                            @endforeach
                        </select>
                        </div>
                        <label>Change Password</label>
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name = "" id = "" class = "form-control" placeholder = ""/>
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
                    <form action="" method = "">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" required/>
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
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Signature link (optional)</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                        <hr>
                        <label>User Info</label>
                        <div class="form-group">
                        <label>Username</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>User Type/Role</label>
                        <select class = "form-control">
                            @foreach($roles as $role)
                            <option value = "{{ $role->id }}"> {{ $role->user_type_name }} </option>
                            @endforeach
                        </select>
                        </div>
                       
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name = "" id = "" class = "form-control" placeholder = ""/>
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
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_user_crud','show');">+ Add</button>
                    </div>
                 </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date Created</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                             
                                @if($user->status == 'Active')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                                </td>
                                <td>{{ $user->usertype->user_type_name }}</td>
                                <td>
                                   
                                    <div class="text-center dropdown">
                                    <!-- Dropdown Toggler --> 
                                    <div class="btn btn-sm btn-default" data-bs-toggle="dropdown" role="button">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </div>

                                    <!-- Dropdown Menu --> 
                                    <div class="dropdown-menu dropdown-menu-right"> 
                                
                                    <div class="dropdown-item d-flex" role="button" onclick = "manageCard('edit_user_crud','show');">
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>Edit</div>
                                    </div> 
                                    <!----> 
                                    <div class="dropdown-item d-flex" role="button"  data-bs-toggle="modal" data-bs-target="#confirmModal"  onclick = "">
                                    <div style="width: 2rem">
                                    <i class="fas fa-list mr-1"></i>
                                    </div>
                                    <div>Delete</div>
                                    </div> 
                                    <!---->
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


