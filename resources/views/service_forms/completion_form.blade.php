@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
    
            <h1>Completion Form</h1>
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
                  <h4>Completion Form</h4>
                  </div>
                  <div class = "col-md-4">
                  <a href = "#select_option_loc">Go to selection of options</a>
                  </div>
              </div>
                
                <div class="card-body">
                    <form action="" method = "">
                        <!--Form details-->
                        <label>User information</label> 
                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" required disabled/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" disabled/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" disabled/>
                        </div>
                        </div>
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "" disabled/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>Student Number</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "20XX-00XXX-XX-X"/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>School Session</label>
                        <select name="" id="" class = "form-control select2">
                          <option value="">Day</option>
                          <option value="">Night</option>
                        </select>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>Term</label>
                        <select name="" id="" class = "form-control select2">
                          <option value="">First Semester</option>
                          <option value="">Second Semester</option>
                          <option value="">Third Semester</option>
                        </select>
                        </div>
                        </div>
                        <div class = "col-md-6">
                        <div class="form-group">
                        <label>Campus</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-6">
                        <div class="form-group">
                        <label>Campus Director</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                        <label>Requirements</label>
                        <div class="form-group">
                        <label>Notarized Affidavit for change of grade</label>
                        <input type="file" name = "" id = "" class = "form-control" required/>
                        </div>
                        <div class="form-group">
                        <label>Copy of Class Record</label>
                        <input type="file" name = "" id = "" class = "form-control" required/>
                        </div>
                        <div class="form-group">
                        <label>Reason</label>
                        <textarea name="" id="" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Reported as</label>
                        <textarea name="" id="" rows="10" class = "form-control"> </textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                        <label>Request details</label>
                        <textarea name="" id="" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name = "" id = "" class = "form-control" required/>
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
      <h4 id = "select_option_loc">Selecton of Options</h4>
    </div>
    <div class = 'col-md-4'>
    <select name="correction_option" id="correction_option" class = "form-control"
    onchange = "chooseCorrection(document.getElementById('correction_option').value);">
      <option value="1">'No Grade' in the Grade Sheets</option>
      <option value="2">Completed all requirements</option>
      <option value="3">Name in the Grade Sheet should be corrected</option>
      <option value="4">Others</option>
    </select>
    </div>
    </div>

    <div class="card-body">
        <!--Form cont..-->
        




        <div id = "no_grade" style = 'display:block;'>

    
        <div class = "row">
        <div class = "col-md-12">
          <div class = "form-group">
            <label>With a final grade of</label>
            <input type="number" step = "0.01" class = "form-control" name = "" id = "" />
          </div>
          </div>
          </div>
        
        </div>


        <div id = "completed" style = 'display:none;'>
       
        <div class = "row">
        <div class = "col-md-12">
          <div class = "form-group">
            <label>With a final grade of</label>
            <input type="number" step = "0.01" class = "form-control" name = "" id = "">
          </div>
          </div>
          </div>
      
        </div>

        <div id = "name_correct" style = 'display:none;'>
    
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
    
        </div>

        <div id = "others" style = 'display:none;'>
    
        <div class = "row">
        <div class = "col-md-12">
          <div class = "form-group">
            <label>Details</label>
            <textarea name="" id="" rows="10" class = "form-control"> </textarea>
          </div>
           </div>
          </div>
   
        </div>
        <div class = 'row'>
        <div class = "col-md-8">  
        </div>
        <div class = "col-md-4">
                        <div class="form-group">
                          Sign (Professor) <br>
                          <span class="badge badge-info">Pending</span>
        </div>
        </div>
        <hr>
        <div class = 'row'>

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
                          <button class = 'btn btn-primary' id = 'student_sign'  data-bs-toggle = "modal" data-bs-target="#confirmModal" >Sign this form</button>
                          <span id = 'signed_badge_status'></span>
                          </div>
                        </div>
                  
                        <div class = "col-md-4">
                        <div class="form-group">
                          Approved by <br>
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
                          Sign (Director) <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                          Received by <br>
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
                          Sign (Registrar) <br>
                          <span class="badge badge-info">Pending</span>
                          </div>
                        </div>
        </div>

        <!--Form cont..:end-->
        <div class = "card-footer">
        <div class="float-right">
                        <button class = "btn btn-secondary"  onclick = "window.location.href = '/request_service_home'">Cancel</button>
                        <button class = "btn btn-primary" type = "submit"   data-bs-toggle = "modal" data-bs-target="#confirmModal" >Submit</button>
                        </div>
                    </form>
        </div>
    </div>
</div>
</div>
         <!---->
    </div>
</div>
@endsection