@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Profile</h1>
           
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
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" disabled/>
                        </div>
                        <div class="form-group">
                        <label>User Type/Role</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" value = "{{ Auth::user()->usertype->user_type_name }}" disabled/>
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
                        <button class = "btn btn-primary" type = "submit" >Update</button>
                        </div>
                    </form>
                </div>
            </div>
   

    

    
        </div>

        
         <!---->
    </div>
</div>
@endsection


