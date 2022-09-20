</div>
    </div> 
    @if(Auth::check() && (Route::current()->getName() != 'guest2' && Route::current()->getName() != 'guest'))
    <footer class="footer fixed-bottom pt-2 bg-white" style = "height: 10%">
    @else
    <footer class="footer fixed-bottom pt-2 custom-bg" style = "height: 10%">
    @endif
  

                <div class="ml-4 mt-3 footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> <a href="#">PUPQC</a> <div class="bullet"></div> <a href = '/login'>Login</a>
                </div>
 
    </footer>
        </div>
</div>


<section id = 'empty_space'></section>




<script>
    /*
    if (typeof jQuery == "undefined") {
    alert("JQuery is not installed");
    } else {
    alert("JQuery is installed correctly!");
    }
    */
   
</script>

<script src="{{ asset('template/vendors/parsleyjs/js/parsley.js') }}"></script>
<script src="{{ asset('template/custom/additional_custom.js') }}"></script>
</body>
</html>
