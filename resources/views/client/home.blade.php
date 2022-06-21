@extends('layouts.header')


@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
     
            <h1>Select a service</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/guest">Home</a></div>
              <div class="breadcrumb-item">Select Service</div>
            </div>
        
        </div>
      
</section>

    <div id = "select_menu">
    <div class="row">
    @foreach($requests as $request)
    <div class="col-md-4">
            <a href = "javascript:void(0);" onclick = "generateService('{{ $request->id }}','{{ $request->request_type }}');">

            <article class="article">
                  <div class="article-header">
                    <div class="article-image" data-background="http://localhost:8000/template/img/example-image.jpg">
                    </div>
                    <div class="article-title">
                      <h2><a href="javascript:void(0);">{{ $request->request_type }}</a></h2>
                    </div>
                  </div>
                  <!--
                  <div class="article-details">
                      <div class = "row">
                      <div class = "col-md-8">
                  <p>Details... </p>
                </div>
             
                  <a href="/" class="btn btn-primary"><i class = 'fa fa-arrow-right'></i></a>
                 
                  </div>
                  </div>
                -->
                </article>
            </a>
        </div>
         <!---->
    @endforeach 
      

    </div>

    
</div>
<!--Hidden--> 
<div id = "selected_service" style = "display:none;">
   <!--Steps--> 
   <section class="section">
   <h3 id = 'request_title' >Request name</h3>
    <button class = "btn btn-primary" onclick = "
        $('#select_menu').css('display','block');

      $('#selected_service').css('display','none');
    ">Go back</button>
</section>
      <!--Steps:end--> 
</div>
<!--Hidden:end--> 
</div>

@endsection


