@extends('layouts.header')


@section('content')

<div class="container">

<section class="section shadow-none border-0 ml-5">
        <div class="section-header mt-5  shadow-none border-0">
  <!--Empty Space-->
        </div>
      
</section>


    <div id = "select_menu">
      <!----> 
      <div class="row">
      <div class="col-md-12">
    
        <h1>Academic Services <br> Kiosk</h1>
      </div>
        <div class="col-md-3  my-auto text-center">
        <div class="card  shadow-none card-outline">
          <h3 class>Services</h3>
        </div>
        </div>
        <div class="col-md-9">
        <div class="card  shadow-none card-outline card-custom-left ml-5">


            <!--Menu--> 
            @foreach($requests as $key=>$request)
        
         
          
            @if(($key == 0 || $key != 1) && ($key) % 3 == 0)
            <div class = "row">
            @endif

              <!---->
         
            <div class="col-md-4">
            <div class="card shadow-md rounded ml-2">
             <div class = "card-body">
             <a class = "nav-link text-center" href = "javascript:void(0);" onclick = "
             showMenu('hide');
             generateService('{{ $request->id }}','{{ $request->request_type }}');
             generateRequirement('{{ $request->id }}');">
             @if(isset($request->icon_file_name) && isset($request->icon_file_path))
              <img class="d-block w-100" src="{{ URL::to('/') }}/{{$request->icon_file_path}}/{{$request->icon_file_name}}">
              @else
              <img class="d-block w-100" src="{{ URL::to('/') }}/template/img/news/img01.jpg">
             
              @endif
              <span class = "text-center mt-2"> {{ $request->request_type }}</span>
             </a>
             </div>
            </div>
            </div>
          
             <!---->
            @if($key + 1 == count($requests))
             <!---->
         
            <div class="col-md-4">
            <div class="card shadow-md rounded ml-2">
             <div class = "card-body">
             <a class = "nav-link text-center" href = "javascript:void(0);" onclick = "
             showElement('id','select_menu2','show');
             showElement('id','select_menu','hide');
             showElement('id','guest_header2','flex');
             showElement('id','guest_header1','hide');
             ">
              <img class="d-block w-100" src="{{ URL::to('/') }}/template/img/news/img01.jpg">
              <span class = "text-center mt-2"> Show more...</span>
             </a>
             </div>
            </div>
            </div>
          
             <!---->
             </div>
            @elseif(($key + 1) % 3 == 0 && $key != 0 && $key != 1 )
           
            </div>
            @endif
      
          
          
   

            @endforeach
            <!--Menu:end-->
        </div>
        </div>
      </div>
      <!----> 

  </div>


<!--Next page--> 

<div id = "select_menu2" style = "display:none;">
      <!----> 
     
      <div class="row">
        
      <div class="col-md-8">
      <button class = "btn btn-primary"  
      onclick = "
      showElement('id','select_menu','show');
      showElement('id','select_menu2','hide');
      showElement('id','guest_header1','flex');
      showElement('id','guest_header2','hide');
      "
      ><i class = "fas fa-arrow-left"></i> Back</button>
      </div>
      <div class="col-md-4">
      <span class = "float-right"> Home &nbsp; > &nbsp; <a href = "" >Menu</a>  </span>
      </div>
      </div>
                 <!--Menu--> 
        @foreach($full_requests as $key=>$request)
        
         
          
        @if(($key == 0 || $key != 1) && ($key) % 4 == 0)
        <div class = "row">
        @endif

        @if(count($full_requests) % 10 == 0 && $key != 0 && $key != 1)
          @if($key == count($full_requests) - 2)
         <!---->
     
        <div class="col-md-3">
        <div class="card shadow-none border-0 ml-2">
         <div class = "card-body">
         
         </div>
        </div>
        </div>
      
         <!---->

          @endif

        @endif
        
          <!---->
     
        <div class="col-md-3">
        <div class="card shadow-md rounded ml-2">
         <div class = "card-body">
         <a class = "nav-link text-center" href = "javascript:void(0);" onclick = "
         showMenu('hide');
         generateService('{{ $request->id }}','{{ $request->request_type }}');
         generateRequirement('{{ $request->id }}');">
              @if(isset($request->icon_file_name) && isset($request->icon_file_path))
              <img class="d-block w-100" src="{{ URL::to('/') }}/{{$request->icon_file_path}}/{{$request->icon_file_name}}">
              @else
              <img class="d-block w-100" src="{{ URL::to('/') }}/template/img/news/img01.jpg">
          
              @endif
          <span class = "text-center mt-2"> {{ $request->request_type }} </span>
         </a>
         </div>
        </div>
        </div>
      
         <!---->

        @if(($key + 1) % 4 == 0 && $key != 0 && $key != 1)
     
        </div>
      
        @endif
  
        @endforeach
        <!--Menu:end-->
</div>
</div>
<!--Next page:end-->
<!--Hidden--> 
<div id = "selected_service" style = "display:none;">
<div class="section-header-breadcrumb float-right mb-3 col-md-12">
<span class = "float-right"> Home &nbsp; > &nbsp; <a href = "" >Menu</a> > <span class = 'request_title'>Request</span> </span>
            </div> 
<h4 class = 'request_title text-center' >Request name</h4>


   <!--Stepper--> 

  <div class="bs-stepper">
  <div class="bs-stepper-header" role="tablist">
    <!-- Steps List -->
    <div class="step" data-target="#what-i-need">
      <button type="button" class="step-trigger" role="tab" id="what-i-need-trigger"  aria-controls="what-i-need">
        <span class="bs-stepper-circle"><i class = "fa fa-dot-circle"></i></span>
        <span class="bs-stepper-label text-primary">What I Need</span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#where-to-get-it">
      <button type="button" class="step-trigger" role="tab"  id="where-to-get-it-trigger" aria-controls="where-to-get-it">
        <span class="bs-stepper-circle"><i class = "fa fa-dot-circle"></i></span>
        <span class="bs-stepper-label text-primary">Where to get it</span>
      </button>
    </div>
 
    <div class="line"></div>
    <div class="step" data-target="#what-to-do">
      <button type="button" class="step-trigger" role="tab" id="what-to-do-trigger" aria-controls="what-to-do">
        <span class="bs-stepper-circle"><i class = "fa fa-dot-circle"></i></span>
        <span class="bs-stepper-label text-primary">What to do</span>
      </button>
    </div>

    <div class="line"></div>
    <div class="step" data-target="#checklist">
      <button type="button" class="step-trigger" role="tab" id="checklist-trigger" aria-controls="checklist"> 
        <span class="bs-stepper-circle"><i class = "fa fa-dot-circle"></i></span>
        <span class="bs-stepper-label text-primary">Checklist</span>
      </button>
    </div>
    <div class="line"></div>
    <div class="step" data-target="#get-my-ticket">
      <button type="button" class="step-trigger" role="tab"  id="get-my-ticket-trigger" aria-controls="get-my-ticket">
        <span class="bs-stepper-circle"><i class = "fa fa-dot-circle"></i></span>
        <span class="bs-stepper-label">Get my ticket</span>
      </button>
    </div>
  </div>
  <div class="bs-stepper-content">
    <!-- Steps Content -->
    <div id="what-i-need" class="content" role="tabpanel"  aria-labelledby="what-i-need-trigger" >
   
      <section id = 'requirements'></section>
      <button class="btn btn-primary" onclick="showMenu('show');">Cancel</button>

      <button class="btn btn-primary float-right" onclick="
      stepper.next()">Next</button>

    </div>
    <div id="where-to-get-it" class="content" role="tabpanel" aria-labelledby="where-to-get-it-trigger">
  
    <section id = 'sources'></section>
    <button class="btn btn-primary" onclick="
      stepper.previous()">Previous</button>

    <button class="btn btn-primary float-right" onclick="
    stepper.next()">Next</button>
    </div>
   
    <div id="what-to-do" class="content" role="tabpanel" aria-labelledby="what-to-do-trigger">
  
    <section id = 'steps'></section>
    <button class="btn btn-primary" onclick="
      stepper.previous()">Previous</button>

    <button class="btn btn-primary float-right" onclick="
    stepper.next();">Next</button>
    </div>

    <div id="checklist" class="content" role="tabpanel" aria-labelledby="checklist-trigger">
    <section id = "checklist_req"></section>
 
    <button class="btn btn-primary" onclick="
      stepper.previous()">Previous</button>

    <button class="btn btn-primary float-right" onclick="
    if(checkReq()==true){ stepper.next(); }">Next</button>
    </div>
    <div id="get-my-ticket" class="content" role="tabpanel" aria-labelledby="get-my-ticket-trigger">


                            <div class = "text-center">
        <label class = "text-center">Please insert your student number</label>
        <input id = 'student_no' name = 'student_no' type="text" placeholder = "xxxx-xxxx-xxxx" class = "form-control">
        <section id = 'final_step'></section>
 
      </div>
    <button class="btn btn-primary" onclick="
    stepper.previous()">Previous</button>

  </div>
</div>


      <!--Stepper:end--> 
     
</div>
<!--Hidden:end--> 
</div>
<!--Finish Step-->
<section id = "finish_step" style = 'display:none;'> 
<div class = "row">
<div class  ="col-md-12">
<div class="section-header-breadcrumb float-right mb-3">
  <span class = "float-right"> Home &nbsp; > &nbsp; <a href = "" >Menu</a> > <span class = 'request_title'>Request</span> </span>
</div> 
</div>
  <div class  ="col-md-1"></div> 
  <div class = "col-md-11">
    
<h5 class = 'request_title text-center' >Request name</h5>
<p class = "text-center">Thank you for using our service. Have a nice day!</p>
<div  class = "text-center">
<canvas id="qr_code"></canvas> <br>
</div> 
<div  class = "text-justify">
<b>Ticket No: </b><span id = "finish-ticket_no">&nbsp;</span> <br>
<b>Student No:  </b><span id = "finish-name">&nbsp;</span> <br>
<b>Purpose:  </b><span class = "request_title">&nbsp;</span><br>
<b>Date:  </b><span id = "finish-created-at">&nbsp;</span><br>

</div>
<div  class = "text-center">
<button class = "btn btn-primary text-center" onclick = "
      showElement('id','select_menu','show');
      showElement('id','select_menu2','hide');
      showElement('id','guest_header1','flex');
      showElement('id','guest_header2','hide');
      showElement('id','finish_step', 'hide');
      stepper.reset();
">Finish</button>
</div>
</section>
</div>
</div>
<!--Finish Step:end-->
@endsection


