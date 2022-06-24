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
             <a class = "nav-link text-center" href = "javascript:void(0);" onclick = "showMenu('hide');generateService('{{ $request->id }}','{{ $request->request_type }}');generateRequirement('{{ $request->id }}');">
              <img class="d-block w-100" src="http://localhost:8000/template/img/news/img01.jpg">
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
              <img class="d-block w-100" src="http://localhost:8000/template/img/news/img01.jpg">
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
         <a class = "nav-link text-center" href = "javascript:void(0);" onclick = "showMenu('hide');generateService('{{ $request->id }}','{{ $request->request_type }}');generateRequirement('{{ $request->id }}');">
          <img class="d-block w-100" src="http://localhost:8000/template/img/news/img01.jpg">
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
<!--Next page:end-->
<!--Hidden--> 
<div id = "selected_service" style = "display:none;">
   <!--Steps--> 

      <!--Steps:end--> 
      <section class = "section">
      <div class="card">
                  <div class="card-header">
                  <h4 class = 'request_title' >Request name</h4>
                  </div>
                  <div class="card-body">
                    <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                      <i class="fas fa-list"></i> All Tickets
                    </a>
                    <div class="tickets">
                    <div class="ticket-items" id="ticket-items">
                      @foreach($requests as $key=>$request)
                      
                       
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <h4>{{ $request->request_type }}</h4>
                          </div>
                          <div class="ticket-desc">
                          @if(isset($request->details))
                            <div>{{ $request->details }}</div>
                          @else 
                          <div><i>Not available</i></div>
                          </div>
                          @endif
                  

                          
                        </div>
                      @endforeach
                      </div>
                      <div class="ticket-content">
                        <div class="ticket-header">
                          <div class="ticket-sender-picture img-shadow">
                            <img src="http://localhost:8000/template/img/avatar/avatar-4.png" alt="image">
                          </div>
                          <div class="ticket-detail">
                            <div class="ticket-title">
                            <h4 class = 'request_title' >Request name</h4>
                            </div>
                            <div class="ticket-info">
                              <div class="font-weight-600">Onsite</div>
                              <div class="bullet"></div>
                              <div class="text-primary font-weight-600">{{now()}}</div>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-description">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
 

                          <div class="gallery">
                          <div class = "row" id = "request_content">

</div>
                          </div>

                          <div class="ticket-divider"></div>

                          <div class="ticket-form">
                         
                            <div class="form-group">
                            
                              <label>Student Number</label>
                              <input id = 'student_no' name = 'student_no' type="text" placeholder = "20XX-00XXX-XX-X" class = "form-control">
                            </div>

                              <div class="form-group text-right">
                              <button class = "btn btn-secondary" onclick = "
                              showMenu('show');
                              ">Go back</button>
                              <button class = "btn btn-primary" id = "submit_request_btn">
                              Submit </button>
                              </div>
                         
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
      </section>
</div>
<!--Hidden:end--> 
</div>

@endsection


