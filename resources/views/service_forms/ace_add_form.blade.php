@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
    
            <h1>Change of Enrollment (Adding of Subject)</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item"><a href="/request_service_home">Select Service</a></div>
              <div class="breadcrumb-item">Form</div>
            </div>
        </div>
      
</section>
    <div class="row">
        <div class="col-md-9">

            <div class="card  card-outline card-primary mt-5">
                <div class="card-header">
                  <div class = "col-md-8">
                  <h4>ACE Form</h4>
                  </div>
                  <div class = "col-md-4">
                  <a href = "#add_subject_loc">Go to adding of subjects</a>
                  </div>
              </div>
                
                <div class="card-body">
                    <form action="" method = "">
                        <!--Form details-->
                        <label>User information</label> 
                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        @if(Auth::user()->client)
                        <label>First Name</label>
                        <input type="text" name = "first_name" id = "first_name" class = "form-control" 
                        value = "{{ Auth::user()->client->first_name}}"
                        placeholder = "" required disabled/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "middle_name" id = "middle_name" class = "form-control" 
                        value = "{{ Auth::user()->client->middle_name}}"
                        placeholder = "" disabled/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "last_name" id = "last_name" class = "form-control" 
                        value = "{{ Auth::user()->client->last_name}}"
                        placeholder = "" disabled/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "extension_name" id = "extension_name" class = "form-control"
                        value = "{{ Auth::user()->client->extension_name}}"
                        placeholder = ""/>
                        </div>
                        </div>
                        @else
                        <label>First Name</label>
                        <input type="text" name = "first_name" id = "first_name" class = "form-control" 
                      
                        placeholder = "" required/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "middle_name" id = "middle_name" class = "form-control" 
                  
                        placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "last_name" id = "last_name" class = "form-control" 
                    
                        placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "extension_name" id = "extension_name" class = "form-control"
                     
                        placeholder = ""/>
                        </div>
                        </div>
                        @endif
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Student Number</label>
                        <input type="text" name = "student_number" id = "student_number" class = "form-control" placeholder = "20XX-00XXX-XX-X"/>
                        </div>
                        </div>
                        </div>
                    

                        <label>Requirements</label>
                        <div class="form-group">
                        <i>Nothing to submmit</i>
                        </div>
                        <hr>
                        <div class="form-group">
                        <label>Request details</label>
                        <textarea name="request_details" id="request_details" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Reason</label>
                        <textarea name="reason" id="reason" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name = "request_deadline" id = "request_deadline" class = "form-control" required/>
                        </div>
                    </form>
                </div>
            </div>
   

    

    
        </div>

         <!---->
         <div class="col-md-3">

            <div class="card  card-outline card-primary mt-5">
                <div class="card-header"><h4>Steps</h4></div>

                <div class="card-body">
                    <!--Steps-->
                    <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-file"></i>
                            </div>
                            <div class="wizard-step-label">
                        Submit requirements
                            </div>
                          </div>
            
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                        Wait for signature
                            </div>
                          </div>
                 
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                        Wait for tagging
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-receipt"></i>
                            </div>
                            <div class="wizard-step-label">
                        Receive receipt after paying
                            </div>
                          </div>
              
                          <div class="wizard-step wizard-step-success">
                            <div class="wizard-step-icon">
                              <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                            Completed
                            </div>
                          </div>
                     </div>
                    <!--Steps:end-->
                </div>
            </div>
        </div>
         <!---->


         <!---->
         <div class="col-md-12">

<div class="card  card-outline card-primary mt-5">
    <div class="card-header">
      <div class = 'col-md-8'>
      <h4 id = "add_subject_loc">Add Subjects</h4>
    </div>
    <div class = 'col-md-4'>
   
      <button class = "btn btn-primary float-right" style = 'margin:3px;' onclick = 'rowManage("add");'>+ Add</button>
      <button class = "btn btn-secondary float-right" onclick = 'rowManage("remove");'>Reset</button>
    </div>
    </div>

    <div class="card-body">
        <!--Form cont..-->
        


                        <div class = "row">
                        <div class = "col-md-2">
                        <div class="form-group">
                        <label>Subject Code</label>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                        <label>Subject Description</label>
                        
                        </div>
                        </div>
                        <div class = "col-md-1">
                        <div class="form-group">
                        <label>Units</label><br>
                       
                        </div>
                        </div>
                        <div class = "col-md-1">
                        <div class="form-group">
                        <label>Hours</label>
                   
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                        <label>Day</label>
                     
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                        <label>Time</label>
                  
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                        <label>Room</label>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                        &nbsp;
                        </div>
                        </div>
                        </div>
                        <!--Row end-->
                        <div class = "row">
                        <div class = "col-md-2">
                        <div class="form-group">
                       
                        <input type="text" name = "subject_id" id = "subject_id" class = "form-control" placeholder = ""/>
                        <!--
                         <select id = "subject_id" name = "subject_id" class = "form-control">
                          <option value = ""></option>
                        -->
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                     
                        <input type="text" name = "subject_desc" id = "subject_desc" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-1">
                        <div class="form-group">
                        
                        <input type="number" name = "units" id = "units" class = "form-control" placeholder = "" />
                        </div>
                        </div>
                        <div class = "col-md-1">
                        <div class="form-group">
                       
                        <input type="number" name = "hours" id = "hours" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                    
                        <input type="text" name = "day" id = "day" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                      
                        <input type="time" style = 'margin-bottom:4px;' name = "time_from" id = "time_from" class = "form-control" placeholder = ""/>
                        <input type="time" style = 'margin-bottom:4px;' name = "time_to" id = "time_to" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                  
                        <input type="text" name = "room_id" id = "room_id" class = "form-control" placeholder = ""/>
                         <!--
                         <select id = "room_id" name = "room_id" class = "form-control">
                          <option value = ""></option>
                        -->
                        </div>
                        </div>
                        </div>
                        <div class = "add_subject_row"></div>
                        <!--Row end-->
        <hr>
        <div class = 'row'>
                      <div class = "col-md-4">
                        <div class="form-group">
                        <label>Units based on Registration Certificate</label>
                        <input type="number" name = "ace_total_units_on_regi" id = "ace_total_units_on_regi" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>Units added</label>
                        <input type="number" name = "units_added" id = "units_added" disabled class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>Total</label>
                        <input type="number" name = "total_units" id = "total_units" class = "form-control" placeholder = "" disabled/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                          Approved Status <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                          Date Approved <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                         Sign (Student)<br>
                          <button type = "button" class = 'btn btn-primary' id = 'student_sign'  data-bs-toggle = "modal" data-bs-target="#confirmModal" >Sign this form</button>
                          <span id = 'signed_badge_status'></span>
                          </div>
                        </div>
                  
                        <div class = "col-md-4">
                        <div class="form-group">
                          Acknowledged by <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                         <div class = "col-md-4">
                        <div class="form-group">
                          Date Acknowledged <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                          Sign (Acknowledgement) <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                          Official Receipt No <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                         <div class = "col-md-4">
                        <div class="form-group">
                          Amount Paid<br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                          Receipt Date <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        </div>
        </div>

        <!--Form cont..:end-->
        <div class = "card-footer">
        <div class="float-right">
                        <button class = "btn btn-secondary"  onclick = "window.location.href = '/request_service_home'">Cancel</button>
                        <button class = "btn btn-primary" type = "button"   data-bs-toggle = "modal" data-bs-target="#submitModal" >Submit</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
</div>
         <!---->
    </div>
</div>
<!--modal-->
<div class="modal fade" id="submitModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to do this action?
        
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id = 'submit_btn'  class="btn btn-primary"  data-bs-dismiss="modal">Proceed</button>

      </div>
    </div>
  </div>
</div>
<!--modal:end-->
<!--modal-->
<div class="modal fade" id="signModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to do this action?
        
      </div>
      <div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id = 'sign_btn' class="btn btn-primary"  data-bs-dismiss="modal">Proceed</button>

      </div>
    </div>
  </div>
</div>
<!--modal:end-->
@endsection