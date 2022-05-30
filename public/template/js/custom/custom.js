
const apiURL = "http://localhost:8000/api/";

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

const manageCard = (id, mode) =>{
 
    $("html, body").animate({ scrollTop: 0 }, "slow");

    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    if(mode == "show"){
        $('#' + id).css('display','flex');     
    }else{
        $('#' + id).css('display','none');    
    }
};


const editRole = (data) =>{
    //view
    let values = JSON.parse(data);
    $('#edit_user_type_name').val(values['user_type_name']);

    $('#edit_role').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'roles/update/' + values['id'],
            async: true,
            method: 'POST',
            data: {
                'user_type_name' : $('#edit_user_type_name').val()
            },
            success: (data)=>{
                
                //Replace with Toastr/Other Notif and Ajax TableLoad
             
                alert('Success');
                location.reload();
            },
            error:({responseJSON})=>{
                console.log(responseJSON);
            }
        });
    })


};

const createRole = () =>{

    $('#create_role').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'roles',
            async: true,
            method: 'POST',
            data: {
                'user_type_name' : $('#create_user_type_name').val()
            },
            success: (data)=>{
                
                //Replace with Toastr/Other Notif and Ajax TableLoad
             
                alert('Success');
                location.reload();
            },
            error:({responseJSON})=>{
                console.log(responseJSON.message);
            }
        });
    })


};

const deleteRole = (data) =>{
    //view
    let values = JSON.parse(data);
  
    
    $('#modal_confirm_btn').on('click',()=>{


        $.ajax({
            url: apiURL + 'roles/delete/' + values['id'],
            async: true,
            method: 'POST',
            success: (data)=>{
               
               //Replace with Toastr/Other Notif and Ajax TableLoad
             
               alert('Success');
               location.reload();
            },
            error:({responseJSON})=>{
                console.log(responseJSON);
            }
        });
    })


};