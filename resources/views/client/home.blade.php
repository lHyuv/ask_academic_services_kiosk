@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
     
            <h1>Welcome</h1>

        
        </div>
      
</section>

    <div id = "select_menu">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-outline card-primary ">
                <div class="card-header">
          <h4>Select a service</h4> 
                </div>

                <div class="card-body">
                  
  
      
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                      @foreach($requests as $key=>$request)
                        @if($key == 0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="active"></li>
                        @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"></li>
                        @endif
                     
                       @endforeach
                      </ol>
                      <div class="carousel-inner">
                      @foreach($requests as $key=>$request)
                  
                        @if($key == 0)
                        <div class="carousel-item active">
                        <a href = "javascript:void(0);" onclick = "showMenu('hide');generateService('{{ $request->id }}','{{ $request->request_type }}');generateRequirement('{{ $request->id }}');">
                          <img class="d-block w-100" src="http://localhost:8000/template/img/news/img01.jpg" alt="First slide">
                          <div class="carousel-caption d-none d-md-block">
                          <h4>{{ $request->request_type }}</h4>
                            @if(isset($request->details))
                            <p>$request->details</p>
                            @else
                            <p>...</p>
                            @endif
                          </div>
                      
                        </a>
                        </div>
                        @else
                        <div class="carousel-item">
                        <a href = "javascript:void(0);" onclick = "showMenu('hide','{{ $request->id}}');generateService('{{ $request->id }}','{{ $request->request_type }}');generateRequirement('{{ $request->id }}');">
                          <img class="d-block w-100" src="http://localhost:8000/template/img/news/img02.jpg" alt="Second slide">
                        
                        <div class="carousel-caption d-none d-md-block">
                        <h4>{{ $request->request_type }}</h4>
                            @if(isset($request->details))
                            <p>$request->details</p>
                            @else
                            <p>...</p>
                            @endif
                          </div>

                          </a>
                        </div>
                        @endif 
                   
                      @endforeach

   
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
    </div>


    </div>
   </div>

</div>
</div>
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


