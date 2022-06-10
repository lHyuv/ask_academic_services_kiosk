
const apiURL = "http://localhost:8000/api/";

$("form").parsley();

const notification = (type, title, message) => {

	toastr.options = {
		preventDuplicates: true,
		preventOpenDuplicates: true,
		positionClass: 'toast-top-center',
        closeButton: true,
        newestOnTop: true,
        progressBar: true,
	};

	return toastr[type](message, title);
};
const showKeyboard = (mode) =>{
    if(mode == "show"){
        $('.keyboard-container').css('display','block');
        $('#empty_space').css('display', 'block');
    }else if(mode == "hide"){
        $('.keyboard-container').css('display','none');
        $('#empty_space').css('display', 'none');
    }
   
};

const drawTable = (table_id) =>{
    if(table_id){
        //do something
        $(`#${table_id}`).load(location.href + ` #${table_id}`);
    }else{
        //$('table')... //do something
        $("table").load(location.href + " table");
    }

};

//-----------------------------------------------------//
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
    $('#edit_user_type_name').val(values['name']);
    $('#edit_details').val(values['description']);
    $('#edit_role').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'roles/update/' + values['id'],
            async: true,
            method: 'POST',
            data: {
                'name' : $('#edit_user_type_name').val(),
                'description' : $('#edit_details').val()
                , 'updated_by' : sessionStorage.getItem('user_id'),
            },
            success: (data)=>{
                

                notification('success','','Successfully updated');
                //location.reload();
                manageCard('edit_role_crud','hide');
                drawTable();
            },
            error:({responseJSON})=>{
                //console.log(responseJSON);
                notification('error','','Something went wrong');
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
                'name' : $('#create_user_type_name').val(),
                'description' : $('#create_details').val()
                , 'created_by' : sessionStorage.getItem('user_id'),
            },
            success: (data)=>{
                
            
             
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_role_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
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
               
               
             
               notification('success','','Successfully deleted');
               //location.reload();
               drawTable();
            },
            error:({responseJSON})=>{
              //  console.log(responseJSON);
              notification('error','','Something went wrong');
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
                'email' : $('#create_email').val(),
                'password' : $('#create_password').val(),
             //   'user_type_id' : $('#create_usertype').val()
                'created_by' : sessionStorage.getItem('user_id'),
            },
            success: (data)=>{
                
            
             
                notification('success','','Successfully created');
                //location.reload();
                manageCard('create_user_crud','hide'); 
                drawTable();
            },
            error:({responseJSON})=>{
              //  console.log(responseJSON.message);
              notification('error','','Something went wrong');
            }
        });
        }
    })


};

const editUser = (data) =>{
    //view
    let values = JSON.parse(data);
   // $('#edit_usertype_id').val(values['user_type_id']);
    $('#edit_email').val(values['email']);
    $('#edit_user').on('submit',(e)=>{

        e.preventDefault();
        if($('#edit_password').val().length == 0){
            $.ajax({
                url: apiURL + 'users/update/' + values['id'],
                async: true,
                method: 'POST',
                data: {
                    'email' : $('#edit_email').val(),
                  //  'user_type_id' : $('#edit_usertype_id').val()
                    'updated_by' : sessionStorage.getItem('user_id'),
                },
                success: (data)=>{
                    
                 
                    notification('success','','Successfully updated');
                   // location.reload();
                   manageCard('edit_user_crud','hide');
                   drawTable();
                },
                error:({responseJSON})=>{
                    notification('error','','Something went wrong');
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
                     //   'user_type_id' : $('#edit_usertype_id').val(),
                        'password' : $('#edit_password').val()
                        , 'updated_by' : sessionStorage.getItem('user_id'),
                    },
                    success: (data)=>{
                        

                     
                        notification('success','','Successfully updated');
                       // location.reload();
                       manageCard('edit_user_crud','hide');
                       drawTable();
                    },
                    error:({responseJSON})=>{
                        notification('error','','Something went wrong');
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
            console.log(data);
              
                
               notification('success','','Successfully deleted');
               drawTable();
            },
            error:({responseJSON})=>{
                notification('error','','Something went wrong');
            }
        });
    })


};


/*
$('input[type=\'password\']').showHidePassword();
*/



//

const editRequest = (data) =>{
    //view

    let values = JSON.parse(data);
    $('#edit_type').val(values['request_type']);


    $('#edit_request').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'requests/update/' + values['id'],
            async: true,
            method: 'POST',
            data: {
                'request_type' : $('#edit_type').val(),
                'updated_by' : sessionStorage.getItem('user_id'),
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                

                notification('success','','Successfully updated');
                //location.reload();
                manageCard('edit_request_crud','hide');
                drawTable();
            },
            error:({responseJSON})=>{
                //console.log(responseJSON);
                notification('error','','Something went wrong');
            }
        });
    })


};

const createRequest = () =>{

    $('#create_request').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'requests',
            async: true,
            method: 'POST',
            data: {
                'request_type' : $('#create_type').val(),
                'created_by' : sessionStorage.getItem('user_id'),
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                
       
             
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_request_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })


};

const deleteRequest = (data) =>{
    //view
    let values = JSON.parse(data);
  
    
    $('#modal_confirm_btn').on('click',()=>{


        $.ajax({
            url: apiURL + 'requests/delete/' + values['id'],
            async: true,
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
               
            
             
               notification('success','','Successfully deleted');
               //location.reload();
               drawTable();
            },
            error:({responseJSON})=>{
              //  console.log(responseJSON);
              notification('error','','Something went wrong');
            }
        });
    })


};

const changePassword = () =>{


    if($('#password').val().length < 8){
        notification('error','','Password should be more than 8 characters');
    }else if($('#password').val() != $('#re_password').val()){
        notification('error','','Password confirmation should be same');
    }else{


    $.ajax({
        url: apiURL + 'users/update/' + sessionStorage.getItem('user_id'),
        async: true,
        method: 'POST',
        data: {
            'email' : $('#email').val(),
            'password' : $('#password').val(),
        },
        headers: {
            'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
        },
        success: (data)=>{
            notification('success','','Successfully updated');
            location.reload();
        },
        error:({responseJSON})=>{
           // console.log(responseJSON.message);
           notification('error','','Something went wrong');
        }
    });
}

};

const createProfile = () =>{
    $('#profile_form').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'clients',
            async: true,
            method: 'POST',
            data: {
                'first_name' : $('#first_name').val(),
                'middle_name' : $('#middle_name').val(),
                'last_name' : $('#last_name').val(),
                'extension_name' : $('#extension_name').val(),
                'user_id' : sessionStorage.getItem('user_id'),
                'created_by' : sessionStorage.getItem('user_id'),
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                notification('success','','Successfully created');
                if( $('#password').val().length > 0){
                    changePassword();
                }else{ 
                    location.reload();
                }

 
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })
};

const editProfile = (id) =>{
    $('#profile_form').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'clients/update/' + id,
            async: true,
            method: 'POST',
            data: {
                'first_name' : $('#first_name').val(),
                'middle_name' : $('#middle_name').val(),
                'last_name' : $('#last_name').val(),
                'extension_name' : $('#extension_name').val(),
                'user_id' : sessionStorage.getItem('user_id'),
                'updated_by' : sessionStorage.getItem('user_id'),
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
              
                notification('success','','Successfully updated');
                if($('#password').val().length > 0){
                    changePassword();
                }else{ 
                    location.reload();
                }
             
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })
};

const chooseCorrection = (option) =>{
    let ids = [
        'no_grade',
        'completed',
        'name_correct',
        'others'
    ];
    let id = ``;
    switch(option){
        case '1':
            id = 'no_grade';
        break;
        case '2':
            id = 'completed';
        break; 
        case '3':
            id = 'name_correct';
        break;
        case '4':
            id = 'others';
        break;
        default:
           //do nothing
    }

    ids.forEach((val)=>{
        $(`#${val}`).css('display','none');
    });
    $(`#${id}`).css('display','block');
 
}




