</div>
    </div> 
    <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2022 <div class="bullet"></div> <a href="#">PUPQC</a>
                </div>
                <div class="footer-right">
                    1.0
                </div>
    </footer>
        </div>
</div>

<section id = 'empty_space'></section>
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
        <div class="key">w</div>
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
        <div class="key close" onclick = "sessionStorage.setItem('keyboard_status', 'close');checkKBStatus();"><br>Close</div>
    </div>
                </div>
            </div>

         

    </div>
</div>


<!--modal-->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
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
    
        <button type="button" id = 'modal_confirm_btn' class="btn btn-primary"  data-bs-dismiss="modal">Proceed</button>
       
  
      </div>
    </div>
  </div>
</div>
<!--modal:end-->
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
