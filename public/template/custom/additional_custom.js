
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
            <div class = "row" id = "subject_row${rowNo}">
            <div class = "col-md-2">
            <div class="form-group">
                       
            <input type="text" name = "subject_id${rowNo}" id = "subject_id${rowNo}" class = "form-control" placeholder = ""/>
            <!--
             <select id = "subject_id${rowNo}" name = "subject_id${rowNo}" class = "form-control">
              <option value = ""></option>
            -->
            </div>
            </div>
            <div class = "col-md-2">
            <div class="form-group">
         
            <input type="text" name = "subject_desc${rowNo}" id = "subject_desc${rowNo}" class = "form-control" placeholder = ""/>
            </div>
            </div>
            <div class = "col-md-1">
            <div class="form-group">
            
            <input type="number" name = "units${rowNo}" id = "units${rowNo}" class = "form-control" placeholder = "" />
            </div>
            </div>
            <div class = "col-md-1">
            <div class="form-group">
           
            <input type="number" name = "hours${rowNo}" id = "hours${rowNo}" class = "form-control" placeholder = ""/>
            </div>
            </div>
            <div class = "col-md-2">
            <div class="form-group">
        
            <input type="text" name = "day${rowNo}" id = "day${rowNo}" class = "form-control" placeholder = ""/>
            </div>
            </div>
            <div class = "col-md-2">
            <div class="form-group">
          
            <input type="time" name = "time${rowNo}" id = "time${rowNo}" class = "form-control" placeholder = ""/>
            </div>
            </div>
            <div class = "col-md-2">
            <div class="form-group">
      
            <input type="text" name = "room_id${rowNo}" id = "room_id${rowNo}" class = "form-control" placeholder = ""/>
             <!--
             <select id = "room_id${rowNo}" name = "room_id${rowNo}" class = "form-control">
              <option value = ""></option>
            -->
            </div>
            </div>
            </div>
            `
        );
      
    }else{
        while(rowNo > 0){
            $('.add_subject_row').find(`#subject_row${rowNo}`).remove()
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






const submitAceAdd = () =>{
    
    let total_units_input = 0;
    $(this).on('change',()=>{


        let ctr = 0;
        total_units_input = 0;
        while(ctr <= rowNo){
            if(ctr == 0){
                total_units_input += parseInt($('#units').val());
            }else{
                total_units_input += parseInt($(`#units${ctr}`).val());
            }
            ctr++;
        }
        $('#units_added').val(total_units_input);
        if($('#ace_total_units_on_regi').val() == null || $('#ace_total_units_on_regi').val() == '' ){
            $('#total_units').val(parseInt(total_units_input));
        }else{
            $('#total_units').val(parseInt(total_units_input) +  parseInt($('#ace_total_units_on_regi').val()) );
        }
        
        ctr = 0;
    })

    $('#ace_total_units_on_regi').on('change',()=>{
       
   
        $('#total_units').val(parseInt(total_units_input) +  parseInt($('#ace_total_units_on_regi').val()) );
    })

    //Submit Form

  
        $('#submit_btn').on('click',(e)=>{
          
            e.preventDefault();

            let json_data = "";
            let url = "";
            if($('#first_name').attr('disabled') == 'disabled'){
                url = "clients/update/" + sessionStorage.getItem('client_id');
                json_data = {
                    'first_name' : $('#first_name').val(),
                    'middle_name' : $('#middle_name').val(),
                    'last_name' : $('#last_name').val(),
                    'extension_name' : $('#extension_name').val(),
                    'student_number' : $('#student_number').val(),
                    'updated_by' : sessionStorage.getItem('user_id'),
                };
            }else{
                url = "clients";
                json_data = {
                    'first_name' : $('#first_name').val(),
                    'middle_name' : $('#middle_name').val(),
                    'last_name' : $('#last_name').val(),
                    'extension_name' : $('#extension_name').val(),
                    'student_number' : $('#student_number').val(),
                    'user_id' : sessionStorage.getItem('user_id'),
                    'created_by' : sessionStorage.getItem('user_id'),
                };
            }
            $.ajax({
                url: apiURL + 'requests',
                async: true,
                method: "GET",
                headers: {
                    'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                },
                success: (data0)=>{

                    let arr = [];
                    let type = 'Adding of Subject'
                    data0.data.map((val)=>{
                        arr.push(val.id,val.request_type)
                    })
                    let request_id = '';
                    if(arr.includes(type)){
           
                        request_id = arr[arr.indexOf(type) - 1];
                     }else{
                        request_id = null;
                     }
        
                $.ajax({
                    url: apiURL + url,
                    async: true,
                    method: "POST",
                    data: json_data,
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                    },
                    success: (data)=>{
                        console.log(data)
                    //    notification('success','Client','Successfully created');
                        //
                        $.ajax({
                            url: apiURL + 'submitted_requests',
                            async: true,
                            method: "POST",
                            data: {
                                request_id: request_id,
                                request_details: $('#request_details').val(),
                                request_deadline:   $('#request_deadline').val(),  
                                school_year: new Date().getFullYear(),
                                reason: $('#reason').val(),
                                created_by : sessionStorage.getItem('user_id'),
                            },
                            headers: {
                                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                            },
                            success: (data2)=>{
                                console.log(data2)
                                //notification('success','Submitted Request','Successfully created');

                                    //
                                    $.ajax({
                                        url: apiURL + 'ace_requests',
                                        async: true,
                                        method: "POST",
                                        data: {
                                            ace_total_units_on_regi: $('#ace_total_units_on_regi').val(),
                                            ace_type:   "Adding of Subject",  
                                            submitted_request_id: data2.data['id'],//
                                            created_by : sessionStorage.getItem('user_id'),
                                        },
                                        headers: {
                                            'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                                        },
                                        success: (data3)=>{
                                            console.log(data3)
                                          //  notification('success','Submitted Request','Successfully created');
                                            //tagged subject
                                            let ctr = 0;
                                            while(ctr <= rowNo){
                                                let subj_data = '';
                                                if(ctr == 0){
                                                    subj_data = {
            

                                                        'ace_request_id': data3.data['id'],
                                                        'day' : $('#day').val(),
                                                        'subject_id' : $('#subject_id').val(),
                                                        'room_id' : $('#room_id').val(),
                                                        'time' : $('#time').val(),
                                                        'no_of_units' : $('#units').val(),
                                                        'created_by' : sessionStorage.getItem('user_id'),
                                                    };

                                                }else{
                                                    subj_data = {
            

                                                        'ace_request_id': data3.data['id'],
                                                        'day' : $(`#day${ctr}`).val(),
                                                        'subject_id' : $(`#subject_id${ctr}`).val(),
                                                        'room_id' : $(`#room_id${ctr}`).val(),
                                                        'time' : $(`#time${ctr}`).val(),
                                                        'no_of_units' : $(`#units${ctr}`).val(),
                                                        'created_by' : sessionStorage.getItem('user_id'),
                                                    };
                                                }
                                                $.ajax({
                                                    url: apiURL + 'tagged_subjects',
                                                    async: true,
                                                    method: "POST",
                                                    data: subj_data,
                                                    headers: {
                                                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                                                    },
                                                    success: (data3)=>{
                                                    //notification('success','Tagged Subject' + ctr,'Successfully created');
                                                        notification('success','','Successfully created');
                                                        window.location.href='/ongoing_services';
                                                        
                                                    } , 
                                               
                                                    error:({responseJSON})=>{
                                                        // console.log(responseJSON.message);
                                                        notification('error','','Something went wrong');
                                                     } 
                                                    })
                                                    ctr++;
                                            }
                                            //

                                        },
                                        error:({responseJSON})=>{
                                           // console.log(responseJSON.message);
                                           notification('error','','Something went wrong');
                                        }
                                    });
                                    //
                            },
                            error:({responseJSON})=>{
                               // console.log(responseJSON.message);
                               notification('error','','Something went wrong');
                            }
                        });
                        //
                    },
                    error:({responseJSON})=>{
                       // console.log(responseJSON.message);
                       notification('error','','Something went wrong');
                    }
                });

            }
        });

        })
 
};

submitAceAdd();


