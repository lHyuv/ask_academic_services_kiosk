@extends('layouts.header')

@section('page_title')
    {{ "Profile" }}
@endsection


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div> 
        </div>
      
</section>
    <div class="row">
        <div class="col-md-12">

            <div class="card mt-5">
                <div class="card-header">
                  <h4>User Information</h4>

              </div>
                
                <div class="card-body">
                    <form action="" method = "" id = "profile_form">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                
                        @if(isset($my_data))
                        <label>First Name</label>
                        <input type="text" name = "first_name" id = "first_name" class = "form-control" placeholder = "" required
                        value = "{{ $my_data->first_name }}"/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "middle_name" id = "middle_name" class = "form-control" placeholder = ""
                        value = "{{ $my_data->middle_name }}"/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "last_name" id = "last_name" class = "form-control" placeholder = "" required
                        value = "{{ $my_data->last_name }}"/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "extension_name" id = "extension_name" class = "form-control" placeholder = ""
                        value = "{{ $my_data->extension_name }}"/>
                        </div>
                        </div>
                        </div>
                    
                        @else
                         <label>First Name</label>
                        <input type="text" name = "first_name" id = "first_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "middle_name" id = "middle_name" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "last_name" id = "last_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "extension_name" id = "extension_name" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    
                        @endif


                 
                        <hr>
                        <label>User Info</label>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="text" name = "email" id = "email" class = "form-control" placeholder = "" disabled value = "{{Auth::user()->email}}"/>
                        </div>
                        <div class="form-group">
                        <label>User Type/Role</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" value = "{{ Auth::user()->roles->pluck('name')[0] }}" disabled/>
                        </div>
                        <label>Change Password</label>
                        <div class="form-group">
                        <label>Password</label>
                        <input type="password" name = "password" id = "password" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" name = "re_password" id = "re_password" class = "form-control" placeholder = ""/>
                        </div>
                        <div class="float-right">
                        @if(isset($my_data))
                        <button class = "btn btn-primary" type = "submit" onclick = "editProfile('{{ $my_data->id }}');" >Update</button>
                        @else 
                        <button class = "btn btn-primary" type = "submit" onclick = "createProfile();" >Update</button>
                        @endif
                        </div>
                    </form>
                </div>
            </div>
   

    

    
        </div>

        
         <!---->
    </div>
</div>
@endsection


