
const apiURL = "http://localhost:8000/api/";
const baseURL = "http://localhost:8000/";
let placeholder_src = $("#placeholder").attr("src");
let create_ctr = 0; //to prevent duplicated AJAX

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

    //

    $("table").dataTable().fnClearTable();
    $("table").dataTable().fnDraw();
    $("table").dataTable().fnDestroy();
    $("table").DataTable({
        "responsive": true, "lengthChange": false,	//"autoWidth":  false,
        "dom": 'Bfrtip',
    
                 "buttons": [
        
                  {
                      extend: 'collection',
                      text: 'Options',
                      buttons: [
                          'copy',
                          'excel',
                          'csv',
                          'pdf',
                          'print'
                      ]
                  }
                ],
    });

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
const showImg = (url) => {

	let ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
	if (url.files && url.files[0] && (ext == "jpeg" || ext == "jpg" || ext == "png")) {
		let reader = new FileReader();

		reader.onload = (e) =>{
			$("#placeholder").attr("src", e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	} else{
        notification('error','','Not a valid image file type!');
    }
};

const editRequest = (data) =>{
    //view


    let values = JSON.parse(data);
    $('#edit_type').val(values['request_type']);
    if(values['icon_file_path'] && values['icon_file_name']){
        $("#placeholder").attr(
            "src",
            `${baseURL}${values['icon_file_path']}/${values['icon_file_name']}`
        );
    }else{
        $("#placeholder").attr(
            "src",
            placeholder_src
        );
    }
    


    $('#edit_request').on('submit',(e)=>{

        e.preventDefault();

        let form_data = new FormData(document.getElementById('edit_request'));
        console.log(form_data)

        // console.log(form_data);

        $.ajax({
            url: apiURL + 'requests/update/' + values['id'],
            async: true,
            method: 'POST',
            data: form_data,
            /*
            {
                'request_type' : $('#edit_type').val(),
                'updated_by' : sessionStorage.getItem('user_id'),
            },
            */
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            //for file
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: (data)=>{
                console.log(data)

                notification('success','','Successfully updated');
                //location.reload();
                manageCard('edit_request_crud','hide');
                drawTable();
            },
            error:({responseJSON})=>{
                console.log(responseJSON);
                notification('error','','Something went wrong');
            }
        });
    })


};


const createRequest = () =>{
    
    $('#create_request').on('submit',(e)=>{

        e.preventDefault();
        
        if (create_ctr > 0) {
            return;
        }
        create_ctr++;
        let form_data = new FormData(document.getElementById('create_request'));
        
       // console.log(form_data);
        $.ajax({
            url: apiURL + 'requests',
            async: true,
            method: 'POST',
            data: form_data,
            /*
            {
                'request_type' : $('#create_type').val(),
                'created_by' : sessionStorage.getItem('user_id'),
            },
            */
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            //for file
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: (data)=>{
                
       
                create_ctr = 0;
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
        if (create_ctr > 0) {
            return;
        }
        create_ctr++;
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
                
       
                create_ctr = 0;
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
        if (create_ctr > 0) {
            return;
        }
        create_ctr++;
        $.ajax({
            url: apiURL + 'requirements',
            async: true,
            method: 'POST',
            data: {
                'request_id' : $('#create_type').val(),
                'requirement_name' : $('#create_req_name').val(),
                'source' : $('#create_req_source').val(),
                'created_by' : sessionStorage.getItem('user_id'),

            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                
       
                create_ctr = 0;
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
    $('#edit_req_source').val(values['source']);
    $('#edit_requirement').on('submit',(e)=>{

        e.preventDefault();

        $.ajax({
            url: apiURL + 'requirements/update/' + values['id'],
            async: true,
            method: 'POST',
            data: {
                'request_id' : $('#edit_type').val(),
                'requirement_name' : $('#edit_req_name').val(),
                'source' : $('#edit_req_source').val(),
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
   


    $('.request_title').text(service_name);
    $(document).ready(()=>{
        if($('#submit_request_btn').length){
          

            $('#submit_request_btn').on('click',()=>{
                confirmNotif(`${service_id}`);
            })
        }else{
         
            $('#final_step').append(
                `
                <button class = "btn btn-primary mt-2 mb-2" id = "submit_request_btn" 
                onclick = "confirmNotif('${service_id}');">
                Generate my Ticket </button>
                `
            );
        }
       

    })
    //
    $.ajax({
        url: apiURL + 'steps/request/'+service_id,
        async: true,
        method: 'GET',
        success: (data)=>{
            
            let content = ``;
            if(data.data.length != 0){
      
            content = `
            <ul>
            `;
            data.data.map((val)=>{
             
                let name = val.step_name ? val.step_name : 'N/A';
                let no = val.step_number ? val.step_number : ' ';
                content +=
                `

                    <li class = "mt-3 mb-3">${no}. ${name}</li>
                   

                `
            }).join("");
            content += `
                </ul>
            `;
            }else{
                content = `
                <ul><li>No steps given yet</li></ul>
                `
            }

            $('#steps').html('');

            $('#steps').append(content);
        },
    });
};

const generateRequirement = (service_id) =>{
    $.ajax({
        url: apiURL + 'requirements/request/'+service_id,
        async: true,
        method: 'GET',
        success: (data)=>{
            
            let content = ``;
            let content2 = ``;
            let source = ``;
            let sourceArr = new Array();
            if(data.data.length != 0){
      
            content = `
            <ul>
            `;
            source = `
            <ul>
            `;
            data.data.map((val)=>{
              //  let details = val.details ? val.details: 'N/A';
                let name = val.requirement_name ? val.requirement_name : 'N/A';
              
                if(!(typeof(val.source) == 'undefined' || val.source == null || val.source == '' || val.source.length == 0)){
                    source +=  `<li class = "mt-3 mb-3">${val.source}</li>`;
                    sourceArr.push(val.source);
                }
                content +=
                `
                        <li class = "mt-3 mb-3">${name}</li>

                `
            }).join("");
            content += `
                </ul>
            `;
            source += `
                </ul>
            `;
            content2 = `
            <ul class="list-unstyled" id = "req_list">
            `;
            data.data.map((val)=>{
            //    let details = val.details ? val.details: 'N/A';
                let name = val.requirement_name ? val.requirement_name : 'N/A';
                content2 +=
                `
                      <li class = "mt-3 mb-3"><input type = "checkbox" class = ""> &nbsp; ${name} </li>
                `
            }).join("");
            content2 += `
                </ul>
            `;

            }else{
                content = `
                <ul><li class = "mt-3 mb-3">No requirements given yet</li></ul>
                `
                content2 = content;
            }
            //
            $('#requirements').html('');

            $('#requirements').append(content);

            $('#checklist_req').html('');

            $('#checklist_req').append(content2);

            if(sourceArr.length == 0){
                source += `
                <ul><li  class = "mt-3 mb-3">No source is given yet</li></ul>
                `
            }
            $('#sources').html('');

            $('#sources').append(source);
        }
    });
};

const showMenu = (mode, request_id) =>{

    if(mode == 'hide'){
        $('#select_menu').css('display','none');

        $('#select_menu2').css('display','none');

        $('#selected_service').css('display','block');

       if(request_id != null || typeof(request_id) != 'undefined'){
            $("#submit_request_btn").on('click',()=>{
                confirmNotif(request_id);
            })
       }
       $('input[type=text]').val('');

    }else{
        
        $('#select_menu').css('display','block');

        $('#select_menu2').css('display','none');

        $('#selected_service').css('display','none');
    
        $('#request_content').html('');

 
    }

};


const confirmNotif = (request_id) =>{
    Swal.fire({
        title: 'Proceed?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            //AJAX
            //Generate code

            let code = "";

            let chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

            for (let i = 0; i < 10; i++){
                code += chars.charAt(Math.floor(chars.length * Math.random()));
                if(i == 3){
                    code += String(new Date().getFullYear())
                }else if(i == 7){
                    code += String(new Date().getMonth() + 1 )
                }else if(i == 9){
                    String(new Date().getDate())
                }
            }

            let student_no = '';
           
            if(!$('#student_no').val()){
                student_no = 'N/A'
            }else{
                student_no = $('#student_no').val()
            }
            $.ajax({
                url: apiURL + 'submitted_requests',
                async: true,
                method: 'POST',
                data: {
                    'request_id' : request_id,
                    'student_number' : student_no,
                    'reference_number' : code,
                },
                success: (data)=>{
                    //
                    $('#finish_step').css('display','block');
                    
                    let qr_code = new QRious({
                        element: document.getElementById('qr_code'),
                        value: code,
                        level: 'M',
                    });

                    if($('#selected_service')){
                        $('#selected_service').css('display','none');
                    }
                    $('#finish-ticket_no').html(code);
                    $('#finish-name').html(student_no);
                    $('#finish-created-at').html(moment().format("MMM Do YYYY"));





                   

                },
                error:({responseJSON})=>{
                    console.log(responseJSON.detail)
                    Swal.fire('Something went wrong', '', 'error')
                }
            })
            //AJAX:end
 
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
};






const showElement = (type,value,mode) =>{
    let pointer = '';
    if(type = 'id'){
        pointer = '#';
    }else if(type = 'class'){
        pointer = '.';
    }

    if(mode == 'flex'){
        $(pointer + value).css('display','flex'); 
    }else if(mode == 'show'){
        $(pointer + value).css('display','block'); 
    }else{
        $(pointer + value).css('display','none');
    }
};

//qrious



//Stepper
let stepper = '';
$(document).ready(function () {
    if($('.bs-stepper')[0]){
        stepper = new Stepper($('.bs-stepper')[0])
    }
       /*
        let qr_code = new QRious({
            element: document.getElementById('qr_code'),
            value: ''
        });

   
      qr_code.set({
        background: '',
        foreground: '',
        level: 'H',
        padding: 25,
        size: 100,
        value: '',
      });
      */
})

const checkReq = () =>{
    if($('#req_list')){
        let check = true;
        $('#req_list li').each((i,val)=>{
         //   console.log($(val).find('input').is(":checked"));

            if($(val).find('input').is(":checked") == false){
               
                check = false;

            }
        })

        if(check == true){
            
            return true;
        }else{
            notification('error','','Check all the requirements first!');
        }
    }else{
       
        return true;
    }
};

const getMost = (arr) => {

        return arr.sort((a,b) =>
        arr.filter(val => val === a).length - arr.filter(val => val === b).length).pop();

 };

 
const getLeast = (arr) => {

    return arr.sort((a,b) =>
    arr.filter(val => val === b).length - arr.filter(val => val === a).length).pop();

};

const numDashboard = () =>{
    $.ajax({
        url: apiURL + 'submitted_requests',
        async: true,
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
        },
        success: (data)=>{
            
            let today = new Array();
            let month = new Array();
            let week = new Array();
            let today_services = new Array();
            let today_services2 = new Array();
            let week_services = new Array();
            let month_services = new Array();
 
            //
            data.data.map((val)=>{
                let value = moment(val.created_at).format("MMM Do YYYY");
                let now = moment(new Date()).format("MMM Do YYYY");

                if(val != null && typeof(val['created_at']) != 'undefined' &&
                new Date(val['created_at']).getFullYear() == new Date().getFullYear()){
               
                    if(value == now){
                        today.push(new Date(val.created_at).getDay());
                        today_services.push(val['requests'].request_type);
                        today_services2.push(val['requests'].request_type);
                    }
                    if(moment(val.created_at).format("MMM YYYY") == moment(new Date()).format("MMM YYYY")){
                        month.push(new Date(val.created_at).getDay());
                        month_services.push(val['requests'].request_type);
                      
                        if(new Date(val.created_at).getDate() >  new Date().getDate() - 7){
                            week.push(new Date(val.created_at).getDay());
                            week_services.push(val['requests'].request_type);
                     
                        }
                    }
                    
                }
            });
            //
            if(today_services.length != 0){
                $('#today_most_service').html(getMost(today_services));
            }else{
                $('#today_most_service').html("Not Available");
            }
            if(today_services2.length != 0){
                $('#today_least_service').html(getLeast(today_services2));
            }else{
                $('#today_least_service').html("Not Available");
            } 
            if(week_services.length != 0){
                $('#week_service').html(getMost(week_services));
            }else{
                $('#week_service').html("Not Available");
            } 
            if(month_services.length != 0){
                $('#month_service').html(getMost(month_services));
            }else{
                $('#month_service').html("Not Available");
            } 

            let days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
            if(month.length != 0){
                $('#month_day').html(days[getMost(month)]);
            }else{
                $('#month_day').html("Not Available");
            } 
            if(week.length != 0){
                $('#week_day').html(days[getMost(week)]);
            }else{
                $('#week_day').html("Not Available");
            } 

        
          
        }

    })

};


if((window.location.href).includes('/home')){
 $(document).ready(()=>{
       
    numDashboard();
})

}


const setSelect = () =>{
    let month_content = ``;

    for(let i = 1; i <= 12; i++){
        month_content += `
        <option value = '${i}'>${i}</option>
        `;
    }


    $('#month').append(month_content);

};

setSelect();

const selectRequest = (id) =>{
    $('select').removeClass('text-primary');
    $('#requests').addClass('text-primary');

    //
    $("table").dataTable().fnClearTable();
    $("table").dataTable().fnDraw();
    $("table").dataTable().fnDestroy();
    $("table").DataTable({
                
    "responsive": true, "lengthChange": false,	//"autoWidth":  false,
    "dom": 'Bfrtip',

             "buttons": [
    
              {
                  extend: 'collection',
                  text: 'Options',
                  buttons: [
                      'copy',
                      'excel',
                      'csv',
                      'pdf',
                      'print'
                  ]
              }
            ],
                'ajax': {
                  
                    url: apiURL + 'submitted_requests/request/' + id,
                    type: "GET",
                   // dataSrc:"",
                    headers: { 
                        Authorization: `Bearer ${sessionStorage.getItem("token")}` ,
                        dataType: "json",
                        Accept: "application/json",
                    },
 
                },
                //put data into columns
        
                'columns': [
    
                  
                  { 
                    'data': (data,type,row)=>{
                        if(data['student_number'] == null || data['student_number'] == 'N/A'){
                            return `<a>User</a>`;
                        }else{
                            return data['student_number'];
                        }
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return data['requests']['request_type'];
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                ]
            })

            
      
  
};

const selectMonth = () =>{
    $('select').removeClass('text-primary');
    $('#month').addClass('text-primary');

    //
    $("table").dataTable().fnClearTable();
    $("table").dataTable().fnDraw();
    $("table").dataTable().fnDestroy();
    $("table").DataTable({
                
    "responsive": true, "lengthChange": false,	//"autoWidth":  false,
    "dom": 'Bfrtip',

             "buttons": [
    
              {
                  extend: 'collection',
                  text: 'Options',
                  buttons: [
                      'copy',
                      'excel',
                      'csv',
                      'pdf',
                      'print'
                  ]
              }
            ],
                'ajax': {
                  
                    url: apiURL + 'submitted_requests/month',
                    type: "POST",
                   // dataSrc:"",
                    headers: { 
                        Authorization: `Bearer ${sessionStorage.getItem("token")}` ,
                        dataType: "json",
                        Accept: "application/json",
                    },
                    data: {
                        'month' : $('#month').val(),
                    },
                    error: ({responseJSON})=>{
                        console.log(responseJSON)
                        notification('error','','Something went wrong')

                    }
 
                },
                //put data into columns
        
                'columns': [
    
                  
                  { 
                    'data': (data,type,row)=>{
                        if(data['student_number'] == null || data['student_number'] == 'N/A'){
                            return `<a>User</a>`;
                        }else{
                            return data['student_number'];
                        }
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return data['requests']['request_type'];
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                ]
            })

            
      
  
};

const selectDay= () =>{
    $('select').removeClass('text-primary');
    $('#day').addClass('text-primary');

    //
    $("table").dataTable().fnClearTable();
    $("table").dataTable().fnDraw();
    $("table").dataTable().fnDestroy();
    $("table").DataTable({
                
    "responsive": true, "lengthChange": false,	//"autoWidth":  false,
    "dom": 'Bfrtip',

             "buttons": [
    
              {
                  extend: 'collection',
                  text: 'Options',
                  buttons: [
                      'copy',
                      'excel',
                      'csv',
                      'pdf',
                      'print'
                  ]
              }
            ],
                'ajax': {
                  
                    url: apiURL + 'submitted_requests/day',
                    type: "POST",
                   // dataSrc:"",
                    headers: { 
                        Authorization: `Bearer ${sessionStorage.getItem("token")}` ,
                        dataType: "json",
                        Accept: "application/json",
                    },
                    data: {
                        'date' : $('#date').val(),
                    },
                    error: ({responseJSON})=>{
                        console.log(responseJSON)
                        notification('error','','Something went wrong')

                    }
 
                },
                //put data into columns
        
                'columns': [
    
                  
                  { 
                    'data': (data,type,row)=>{
                        if(data['student_number'] == null || data['student_number'] == 'N/A'){
                            return `<a>User</a>`;
                        }else{
                            return data['student_number'];
                        }
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return data['requests']['request_type'];
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                ]
            })

            
      
  
};

const selectRange = () =>{
    
    $('select').removeClass('text-primary');
    $('#date_from').addClass('text-primary');
    $('#date_to').addClass('text-primary');

    //
    $("table").dataTable().fnClearTable();
    $("table").dataTable().fnDraw();
    $("table").dataTable().fnDestroy();
    $("table").DataTable({
                
    "responsive": true, "lengthChange": false,	//"autoWidth":  false,
    "dom": 'Bfrtip',

             "buttons": [
    
              {
                  extend: 'collection',
                  text: 'Options',
                  buttons: [
                      'copy',
                      'excel',
                      'csv',
                      'pdf',
                      'print'
                  ]
              }
            ],
                'ajax': {
                  
                    url: apiURL + 'submitted_requests/query',
                    type: "POST",
                   // dataSrc:"",
                    headers: { 
                        Authorization: `Bearer ${sessionStorage.getItem("token")}` ,
                        dataType: "json",
                        Accept: "application/json",
                    },
                    data: {
                        'date_from' : $('#date_from').val(),
                        'date_to' : $('#date_to').val(),
                    },
                    error: ({responseJSON})=>{
                        console.log(responseJSON)
                        notification('error','','Something went wrong')

                    }
 
                },
                //put data into columns
        
                'columns': [
    
                  
                  { 
                    'data': (data,type,row)=>{
                        if(data['student_number'] == null || data['student_number'] == 'N/A'){
                            return `<a>User</a>`;
                        }else{
                            return data['student_number'];
                        }
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return data['requests']['request_type'];
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                ]
            })

            
      
  
};