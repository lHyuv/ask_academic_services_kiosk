@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        <div class="row">
            <h1>Overload of Subjects</h1>
        </div>  
        </div>
      
</section>
    <div class="row">
        <div class="col-md-9">

            <div class="card  card-outline card-primary mt-5">
                <div class="card-header">
                <div class = "col-md-7">
                  <h4>ACE Form</h4>
                </div>
                  <div class = "col-md-5">
                  <a  href = "#overload_subject_loc">Go to overloading of subjects</a>
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
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Student Number</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                        <label>Requirements</label>
                        <div class="form-group">
                        <label>Request letter for Overload</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <div class="form-group">
                        <label>Certificate of Registration for current semester</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <div class="form-group">
                        <label>Fully-accomplished Request for Overload Form</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <hr>
                        <div class="form-group">
                        <label>Request details</label>
                        <textarea name="" id="" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Reason</label>
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
                        Submit requirements for approval
                            </div>
                          </div>
            
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                        Wait for approval
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
      <h4 id ="overload_subject_loc">Overload Subjects</h4>
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
                        <label>Course Code</label>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                        <label>Course Description</label>
                        
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
                       
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                     
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-1">
                        <div class="form-group">
                        
                        <input type="number" name = "" id = "" class = "form-control" placeholder = "" />
                        </div>
                        </div>
                        <div class = "col-md-1">
                        <div class="form-group">
                       
                        <input type="number" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                    
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                      
                        <input type="time" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-2">
                        <div class="form-group">
                  
                        <input type="text" name = "" id = "" class = "form-control" placeholder = ""/>
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
                        <input type="number" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>Units added</label>
                        <input type="number" name = "" id = "" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        <div class = "col-md-4">
                        <div class="form-group">
                        <label>Total</label>
                        <input type="number" name = "" id = "" class = "form-control" placeholder = "" disabled/>
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
                          <button class = 'btn btn-primary' id = 'student_sign' data-bs-toggle = "modal" data-bs-target="#confirmModal" >Sign this form</button>
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
                        <button class = "btn btn-secondary" onclick = "window.location.href = '/request_service_home'">Cancel</button>
                        <button class = "btn btn-primary" type = "submit"    data-bs-toggle = "modal" data-bs-target="#confirmModal">Submit</button>
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


