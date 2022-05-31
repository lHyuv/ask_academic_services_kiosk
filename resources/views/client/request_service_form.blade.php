@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
        
            <h1>Request Service</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item"><a href="/request_service_home">Select Service</a></div>
              <div class="breadcrumb-item">Form</div>
            </div>
        </div>
      
</section>
    <div class="row">
        <div class="col-md-8">

            <div class="card card-outline card-primary mt-5">
                <div class="card-header"><h4>Process name</h4></div>

                <div class="card-body">
                    <form action="" method = "">
                        <div class="form-group">
                        <label>Request details</label>
                        <textarea name="" id="" rows="10" class = "form-control"> </textarea>
                        </div>
                        <div class="form-group">
                        <label>Requirement 1</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <div class="form-group">
                        <label>Requirement 2</label>
                        <input type="text" name = "" id = "" class = "form-control" placeholder = "Enter url.." required/>
                        </div>
                        <div class="form-group">
                        <label>Deadline</label>
                        <input type="date" name = "" id = "" class = "form-control" required/>
                        </div>
                        <div class="float-right">
                        <button class = "btn btn-secondary" onclick = "history.back();">Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Submit</button>
                        </div>
                    </form>
                </div>
            </div>
   

    

    
        </div>

         <!---->
         <div class="col-md-4">

            <div class="card card-outline card-primary mt-5">
                <div class="card-header"><h4>Steps</h4></div>

                <div class="card-body">
                    <!--Steps-->
                    <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-file"></i>
                            </div>
                            <div class="wizard-step-label">
                            Step name..
                            </div>
                          </div>
            
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                            Step name..
                            </div>
                          </div>
                 
                   
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-stamp"></i>
                            </div>
                            <div class="wizard-step-label">
                            Step name..
                            </div>
                          </div>
              
                          <div class="wizard-step wizard-step-success">
                            <div class="wizard-step-icon">
                              <i class="fas fa-check"></i>
                            </div>
                            <div class="wizard-step-label">
                            Request Completed
                            </div>
                          </div>
                     </div>
                    <!--Steps:end-->
                </div>
            </div>
        </div>
         <!---->

    </div>
</div>
@endsection


