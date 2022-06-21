
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



const createStep = () =>{

    $('#create_step').on('submit',(e)=>{

        e.preventDefault();
        
        $.ajax({
            url: apiURL + 'steps',
            async: true,
            method: 'POST',
            data: {
                'request_id' : $('#create_type').val(),
                'step_number' : $('#create_step_no').val(),
                'step_name' : $('#create_step_name').val(),
                'created_by' : sessionStorage.getItem('user_id'),

            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                
       
             
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_step_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })


};

const editStep = (data) =>{
    //view

    let values = JSON.parse(data);
    $('#edit_type').val(values['request_id']);
    $('#edit_step_no').val(values['step_number']);
    $('#edit_step_name').val(values['step_name']);

    $('#edit_step').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'steps/update/' + values['id'],
            async: true,
            method: 'POST',
            data: {
                'request_id' : $('#edit_type').val(),
                'step_number' : $('#edit_step_no').val(),
                'step_name' : $('#edit_step_name').val(),
                'updated_by' : sessionStorage.getItem('user_id'),
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                

                notification('success','','Successfully updated');
                //location.reload();
                manageCard('edit_step_crud','hide');
                drawTable();
            },
            error:({responseJSON})=>{
                //console.log(responseJSON);
                notification('error','','Something went wrong');
            }
        });
    })


};


const deleteStep = (data) =>{
    //view
    let values = JSON.parse(data);
  
    
    $('#modal_confirm_btn').on('click',()=>{


        $.ajax({
            url: apiURL + 'steps/delete/' + values['id'],
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

const createRequirement = () =>{

    $('#create_requirement').on('submit',(e)=>{

        e.preventDefault();
        
        $.ajax({
            url: apiURL + 'requirements',
            async: true,
            method: 'POST',
            data: {
                'request_id' : $('#create_type').val(),
                'requirement_name' : $('#create_req_name').val(),
                'created_by' : sessionStorage.getItem('user_id'),

            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                
       
             
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_requirement_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })


};

const editRequirement = (data) =>{
    //view

    let values = JSON.parse(data);
    $('#edit_type').val(values['request_id']);
    $('#edit_req_name').val(values['requirement_name']);

    $('#edit_requirement').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'requirements/update/' + values['id'],
            async: true,
            method: 'POST',
            data: {
                'request_id' : $('#edit_type').val(),
                'requirement_name' : $('#edit_req_name').val(),
                'updated_by' : sessionStorage.getItem('user_id'),
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                

                notification('success','','Successfully updated');
                //location.reload();
                manageCard('edit_requirement_crud','hide');
                drawTable();
            },
            error:({responseJSON})=>{
                //console.log(responseJSON);
                notification('error','','Something went wrong');
            }
        });
    })


};

const deleteRequirement = (data) =>{
    //view
    let values = JSON.parse(data);
  
    
    $('#modal_confirm_btn').on('click',()=>{


        $.ajax({
            url: apiURL + 'requirements/delete/' + values['id'],
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


//


const createUserRole = () =>{

    $('#create_userrole').on('submit',(e)=>{

        e.preventDefault();
        
        $.ajax({
            url: apiURL + 'user_roles',
            async: true,
            method: 'POST',
            data: {
                'user_id' : $('#create_user').val(),
                'role_id': $('#create_role').val(),
                'created_by' : sessionStorage.getItem('user_id'),

            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                
       
             
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_userrole_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })


};
const checkKBStatus = () =>{


if(typeof(sessionStorage.getItem('keyboard_status')) != 'undefined' || sessionStorage.getItem('keyboard_status') != null){
if(sessionStorage.getItem('keyboard_status') == 'show'){
    showKeyboard('show');
}else{
    
    showKeyboard('hide');
}

if((window.location.href).includes('/login') || (window.location.href).includes('/register') ){
    sessionStorage.setItem('keyboard_status','hide');
}
}
};
checkKBStatus();

const generateService = (service_id, service_name) =>{
    $('#select_menu').css('display','none');

    $('#selected_service').css('display','block');

    $('#request_title').text(service_name);
    //
    $.ajax({
        url: apiURL + 'steps/request/'+service_id,
        async: true,
        method: 'GET',
        success: (data)=>{
            console.log(data.data.length)
            let content = ``;
            if(data.data.length != 0){
      
            content = `
            <hr>
            <div class = "row">
 
   
            <div class="col-md-12">
              <div class="activities">
            `;
            data.data.map((val)=>{
                let details = val.details ? val.details: 'N/A';
                let name = val.step_name ? val.step_name : 'N/A';
                let icon = val.step_icon ? val.step_icon : 'fas fa-file';
                content +=
                `

                    <div class="activity">
                      <div class="activity-icon bg-primary text-white shadow-primary">
                        <i class="${icon}"></i>
                      </div>
                      <div class="activity-detail">
                        <div class="mb-2">
                          <h5 class="text-job text-primary"> ${name}</h5>
  
                        </div>
                        <p>${ details } </p>
                      </div>
                    </div>
                    </div>

                `
            }).join("");
            content += `
            </div>
            </div>

            </div>
            `;
            }else{
                content = `
                <hr>
                <div class = "row">
                <div class="col-md-12">
                <div class="activities">
                <div class="activity">
                <div class="activity-icon bg-primary text-white shadow-primary">
                  <i class="fas fa-file"></i>
                </div>
                <div class="activity-detail">
                  <div class="mb-2">
                    <h5 class="text-job text-primary">No content to be shown</h5>

                  </div>
                  <p>...</p>
                </div>
              </div>
              </div>
              </div>
              </div>
  
              </div>
                `
            }
            $('#request_title').append(content);
        }
    });
};

