</div>
    </div> 
    @if(Auth::check() && (Route::current()->getName() != 'guest2' && Route::current()->getName() != 'guest'))
    <footer class="footer fixed-bottom pt-2 bg-white" style = "height: 10%">
        <div class="ml-4 mt-3 footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> <a href="#">PUPQC</a> 
                </div>
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
<section id = 'empty_space_2'></section>
<div class="row keyboard-container">
        <div class="col-md-12">

            <div class="card">
             

                <div class="card-body">
           
        <div class="keyboard-base">

        <div class="key">~ <br><span class = "text-muted">`</span></div>
        <div class="key">1 <br><span class = "text-muted">!</span></div>
        <div class="key">2 <br><span class = "text-muted">@</span></div>
        <div class="key">3 <br><span class = "text-muted">#</span></div>
        <div class="key">4 <br><span class = "text-muted">$</span></div>
        <div class="key">5 <br><span class = "text-muted">%</span></div>
        <div class="key">6 <br><span class = "text-muted">^</span></div>
        <div class="key">7 <br><span class = "text-muted">&</span></div>
        <div class="key">8 <br><span class = "text-muted">*</span></div>
        <div class="key">9 <br><span class = "text-muted">(</span></div>
        <div class="key">0 <br><span class = "text-muted">)</span></div>
        <div class="key">- <br><span class = "text-muted">_</span></div>
        <div class="key">+ <br><span class = "text-muted">=</span></div>
        <div class="key delete">Backspace</div>
        <div class="key tab">&nbsp;</div>
        <div class="key">Q</div>
        <div class="key">W</div>
        <div class="key">E</div>
        <div class="key">R</div>
        <div class="key">T</div>
        <div class="key">Y</div>
        <div class="key">U</div>
        <div class="key">I</div>
        <div class="key">O</div>
        <div class="key">P</div>
        <div class="key">{ <br><span class = "text-muted">[</span></div>
        <div class="key">} <br><span class = "text-muted">]</span></div>
        <div class="key backslash"> \ <br><span class = "text-muted">|</span></div>
        <div class="key capslock">CapsLock</div>
        <div class="key">A</div>
        <div class="key">S</div>
        <div class="key">D</div>
        <div class="key">F</div>
        <div class="key">G</div>
        <div class="key">H</div>
        <div class="key">J</div>
        <div class="key">K</div>
        <div class="key">L</div>
        <div class="key"> : <br><span class = "text-muted">;</span></div>
        <div class="key"> "<br><span class = "text-muted">'</span></div>
        <div class="key return">Enter</div>
        <div class="key leftshift">Shift</div>
        <div class="key">Z</div>
        <div class="key">X</div>
        <div class="key">C</div>
        <div class="key">V</div>
        <div class="key">B</div>
        <div class="key">N</div>
        <div class="key">M</div>
        <div class="key"><<br><span class = "text-muted">,</span></div>
        <div class="key">> <br><span class = "text-muted">.</span></div>
        <div class="key">? <br><span class = "text-muted">/</span></div>
        <div class="key rightshift">&nbsp;</div>
        <div class="key leftctrl">&nbsp;</div>
        <div class="key">&nbsp;</div>
        <div class="key command">&nbsp;</div>
        <div class="key space">Space</div>
        <div class="key command">&nbsp;</div>
        <div class="key">&nbsp;</div>
        <div class="key">&nbsp;</div>
        <div class="key close" onclick = "/*sessionStorage.setItem('keyboard_status', 'close');checkKBStatus();*/showKeyboard('hide');"><br>Close</div>
    </div>
                </div>
            </div>

         

    </div>
</div>



<script>
    /*
    if (typeof jQuery == "undefined") {
    alert("JQuery is not installed");
    } else {
    alert("JQuery is installed correctly!");
    }
    */
   
</script>

<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="{{ asset('template/custom/additional_custom.js') }}"></script>
</body>
</html>
