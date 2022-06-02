
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

const createUser = () =>{

    $('#create_user').on('submit',(e)=>{

        e.preventDefault();
        if($('#create_password').val() != $('#create_password_confirm').val()){
            //Replace this with Toastr or other notif
            alert('Passwords does not match!');
        }else if($('#create_password').val().length < 8){
            //Replace this with Toastr or other notif
            alert('Passwords must be 8 characters or more!');            
        }else{
        $.ajax({
            url: apiURL + 'users',
            async: true,
            method: 'POST',
            data: {
                'username' : $('#create_username').val(),
                'password' : $('#create_password').val(),
                'user_type_id' : $('#create_usertype').val()
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
        }
    })


};

const editUser = (data) =>{
    //view
    let values = JSON.parse(data);
    $('#edit_usertype_id').val(values['user_type_id']);
    $('#edit_username').val(values['username']);
    $('#edit_user').on('submit',(e)=>{

        e.preventDefault();
        if($('#edit_password').val().length == 0){
            $.ajax({
                url: apiURL + 'users/update/' + values['id'],
                async: true,
                method: 'POST',
                data: {
                    'username' : $('#edit_username').val(),
                    'user_type_id' : $('#edit_usertype_id').val()
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
        }else{
            if($('#edit_password').val() != $('#edit_password_confirm').val()){
                //Replace this with Toastr/Other notif

                alert('Passwords must match!');
            }else if($('#edit_password').val().length < 8){
                //Replace this with Toastr/Other notif

                alert('Passwords must be 8 characters or more');                
            }else{
                $.ajax({
                    url: apiURL + 'users/update/' + values['id'],
                    async: true,
                    method: 'POST',
                    data: {
                        'username' : $('#edit_username').val(),
                        'user_type_id' : $('#edit_usertype_id').val(),
                        'password' : $('#edit_password').val()
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
            }
        }

    })
  

};


const deleteUser = (data) =>{
    //view
    let values = JSON.parse(data);
  
    
    $('#modal_confirm_btn').on('click',()=>{


        $.ajax({
            url: apiURL + 'users/delete/' + values['id'],
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
/*
$('input[type=\'password\']').showHidePassword();
if((window.location.href).includes('login')){
    $("form").parsley();
}
*/