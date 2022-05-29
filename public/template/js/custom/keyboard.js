

const showKeyboard = (mode) =>{
    if(mode == "show"){
        $('.keyboard-container').css('display','block');
        $('#empty_space').css('display', 'block');
    }else if(mode == "hide"){
        $('.keyboard-container').css('display','none');
        $('#empty_space').css('display', 'none');
    }
   
};

let rowNo = 0;
const rowManage = (mode) =>{
    if(mode == 'add'){
        rowNo++;
        $('.add_subject_row').append(
            `
            <div class = "row" id = "overload-row${rowNo}">
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
            `
        );
      
    }else{
        while(rowNo > 0){
            $('.add_subject_row').find(`#overload-row${rowNo}`).remove()
            rowNo--;
        }
    }

};

