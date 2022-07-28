
const apiURL = "http://localhost:8000/api/";
const baseURL = "http://localhost:8000/";
let placeholder_src = $("#placeholder").attr("src");
let create_ctr = 0; //to prevent duplicated AJAX
let query_no = 0;
let days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
let months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
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
        $('footer').css('display','none');
        $('.keyboard-container').css('display','block');
        $('#empty_space').css('display', 'block');
    }else if(mode == "hide"){
        $('.keyboard-container').css('display','none');
        $('#empty_space').css('display', 'none');
         $('footer').css('display','block');
    }
   
};





const deleteFormChecked = () =>{
    let ids = new Array();
    $('td').each((i,val)=>{
        if($(val).find('input').val()){
           
            if($(val).find('input').is(":checked") == true){
               
                ids.push($(val).find('input').val())
    
            }
        }

    });
        Swal.fire({
            title: 'Delete?',
            showDenyButton: true,
          //  showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-3',
                denyButton: 'order-2',
              }
          }).then((result) => {
     
            if (result.isConfirmed) {
                 //delete loop
                ids.forEach((val,i)=>{
                $.ajax({
                    url: apiURL + 'forms/delete/' + val,
                    async: true,
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                    },
                    success: (data)=>{
                       
                     if(i == ids.length - 1){
                        notification('success','','Successfully deleted');
                        //location.reload();
                        drawTable();
                     }

                    },
                    error:({responseJSON})=>{
                      //  console.log(responseJSON);
                      notification('error','','Something went wrong');
                    }
                });
            })
            }
          })
        //
 
};

const deleteStepChecked = () =>{
    let ids = new Array();
    $('td').each((i,val)=>{
        if($(val).find('input').val()){
           
            if($(val).find('input').is(":checked") == true){
               
                ids.push($(val).find('input').val())
    
            }
        }

    });
        Swal.fire({
            title: 'Delete?',
            showDenyButton: true,
          //  showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-3',
                denyButton: 'order-2',
              }
          }).then((result) => {
     
            if (result.isConfirmed) {
                 //delete loop
                ids.forEach((val,i)=>{
                $.ajax({
                    url: apiURL + 'steps/delete/' + val,
                    async: true,
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                    },
                    success: (data)=>{
                       
                     if(i == ids.length - 1){
                        notification('success','','Successfully deleted');
                        //location.reload();
                        drawTable();
                     }

                    },
                    error:({responseJSON})=>{
                      //  console.log(responseJSON);
                      notification('error','','Something went wrong');
                    }
                });
            })
            }
          })
        //
 
};


const deleteReqChecked = () =>{
    let ids = new Array();
    $('td').each((i,val)=>{
        if($(val).find('input').val()){
           
            if($(val).find('input').is(":checked") == true){
               
                ids.push($(val).find('input').val())
    
            }
        }

    });
        Swal.fire({
            title: 'Delete?',
            showDenyButton: true,
          //  showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-3',
                denyButton: 'order-2',
              }
          }).then((result) => {
     
            if (result.isConfirmed) {
                 //delete loop
                ids.forEach((val,i)=>{
                $.ajax({
                    url: apiURL + 'requirements/delete/' + val,
                    async: true,
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                    },
                    success: (data)=>{
                       
                     if(i == ids.length - 1){
                        notification('success','','Successfully deleted');
                        //location.reload();
                        drawTable();
                     }

                    },
                    error:({responseJSON})=>{
                      //  console.log(responseJSON);
                      notification('error','','Something went wrong');
                    }
                });
            })
            }
          })
        //
 
};


const deleteRequestChecked = () =>{
    let ids = new Array();
    $('td').each((i,val)=>{
        if($(val).find('input').val()){
           
            if($(val).find('input').is(":checked") == true){
               
                ids.push($(val).find('input').val())
    
            }
        }

    });
        Swal.fire({
            title: 'Delete?',
            showDenyButton: true,
          //  showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
            customClass: {
                actions: 'my-actions',
                cancelButton: 'order-1 right-gap',
                confirmButton: 'order-3',
                denyButton: 'order-2',
              }
          }).then((result) => {
     
            if (result.isConfirmed) {
                 //delete loop
                ids.forEach((val,i)=>{
                $.ajax({
                    url: apiURL + 'requests/delete/' + val,
                    async: true,
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                    },
                    success: (data)=>{
                       
                     if(i == ids.length - 1){
                        notification('success','','Successfully deleted');
                        //location.reload();
                        drawTable();
                     }

                    },
                    error:({responseJSON})=>{
                      //  console.log(responseJSON);
                      notification('error','','Something went wrong');
                    }
                });
            })
            }
          })
        //
 
};


const drawTable = (table_id) =>{
    let buttons =  [
        
        {
            extend: 'collection',
            text: 'Options',
            buttons: [
                'copy',
                'excel',
                'csv',
                'pdf',
                'print',
            ]
        }
      ];

    if((window.location.href).includes('/requests')){
        buttons =  [
            'copy',
            'excel',
            'csv',
            'pdf',
            'print',
            {
                  text: 'Delete Checked',
                  action: function ( e, dt, node, config ) {
                      deleteRequestChecked();
                  }
            }
        ]
    }else if((window.location.href).includes('/forms')){
        buttons = [
            'copy',
            'excel',
            'csv',
            'pdf',
            'print',
            {
                  text: 'Delete Checked',
                  action: function ( e, dt, node, config ) {
                      deleteFormChecked();
                  }
            }
        ]
    }else if((window.location.href).includes('/steps')){
        buttons =  [
        
            {
                extend: 'collection',
                text: 'Options',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print',
                    {
                          text: 'Delete Checked',
                          action: function ( e, dt, node, config ) {
                              deleteStepChecked();
                          }
                    }
                ]
            }
          ];
    }else if((window.location.href).includes('/requirements')){
        buttons = [
            'copy',
            'excel',
            'csv',
            'pdf',
            'print',
            {
                  text: 'Delete Checked',
                  action: function ( e, dt, node, config ) {
                      deleteReqChecked();
                  }
            }
        ]
    }

    //Temporary while ajax load is not yet fixed
    location.reload();
/*
    if(table_id){
        //do something
        $(`#${table_id}`).load(window.location.href + ` #${table_id}`);
    }else{
        //$('table')... //do something
        $("table").load("http://localhost:8000/forms" + " table");
    }

    //
    
    $("table").dataTable().fnClearTable();
    $("table").dataTable().fnDraw();
    $("table").dataTable().fnDestroy();
    $("table").DataTable().clear()
  //  $("table").DataTable().destroy();
  
    $("table").DataTable({
        "responsive": true, "lengthChange": false,//	"autoWidth":  true,
      //  "dom": 'Bfrtip',
        "searching":true,
        "sorting":true,
        "serverSide":false,
        "bFilter": true,
     
                 "buttons": [
        
                  {
                      extend: 'collection',
                      text: 'Options',
                      buttons: buttons,
                  }
                ],
    });

    //catch datatable ini error
    $.fn.dataTable.ext.errMode = ( settings, help, msg ) => { 
        console.log(msg);
    };
    */
};

const printReport = () =>{

    $('.custom_widget').css('display','none');
    $('#backlog_header').css('display','block');
    $('#backlog_table').addClass('mt-5');
    $('#sidebar').css('display','none');
    $('#header').css('display','none');
    $('.navbar-bg').css('display','none');
    $('footer').css('display','none');
    $('.section').css('display','none');
    $('#query').css('display','none');
    $('.col-md-8').attr('class','col-md-12')
    $('.card').addClass('col-md-12');
    $('table').attr('class','table');
    $('.card').removeClass('card-primary'); 
    $('#card_title').css('display','none');
    $('hr').css('display','block');
    switch(query_no){
        case 1: $('#query_text').html('Query: Request - ' + $('#requests option:selected').text()); break;
        case 2: $('#query_text').html('Query: Month - ' + moment($('#month').val(), 'M').format('MMMM')); break;
        case 3: $('#query_text').html('Query: Date - ' + moment($('#date').val()).format("MMM Do YYYY")); break;
        case 4: $('#query_text').html(
            'Query: ' + moment($('#date_from').val()).format("MMM Do YYYY") + ' to ' + moment($('#date_to').val()).format("MMM Do YYYY")
        ); break;
        case 5: $('#query_text').html(
            'Query: Student Number - ' + $('#student_no').val()
        ); break;
        case 6:     
            if($('#report').val() == 'Weekly'){
                $('#query_text').html(
                    'Query: This Week/Weekly'
                );
            }else if($('#report').val() == 'Monthly'){
                $('#query_text').html(
                    'Query: This Month/Monthly (' + months[new Date().getMonth()] + ')'
                );
            }
        case 7:
            $('#query_text').html(
                'Query: Status: ' + $('#statuses').val()
            ); break;

        case 8:
                $('#query_text').html(
                    'Query: Program: ' + $('#programs').val()
                ); break;

        default: $('#query_text').html('');
    }
    $('table').DataTable().destroy()
    $('table').dataTable({
        responsive: true, 
        lengthChange: false,	
        searching: false, 
        paging: false, 
        info: false,
        
    });
    
  
    window.print();

    setTimeout(function() {
        window.location.reload()
    }, 100);

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
    $('#create_role_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
    $('#edit_user_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
  
    
    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {

        if (result.isConfirmed) {
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
    }
    })


};

const createUser = () =>{
    $('#edit_user_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
    $('#create_user_crud').css('display','none');
    $('input').val('');
    $('select').val('');
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

    
    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {

        if (result.isConfirmed) {
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
    }
    })


};


/*
$('input[type=\'password\']').showHidePassword();
*/



//
const showImg = (url) => {
   // console.log(url)
	let ext = url.name.substring(url.name.lastIndexOf(".") + 1).toLowerCase();
	if ((ext == "jpeg" || ext == "jpg" || ext == "png")) {
		let reader = new FileReader();

		reader.onload = (e) =>{
			$("#placeholder").attr("src", e.target.result);
		};

		reader.readAsDataURL(url);
	} else{
        notification('error','','Not a valid image file type!');
    }
};


const editRequest = (data) =>{
    //view

    $('#create_request_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
    let values = JSON.parse(data);
    $('#edit_type').val(values['request_type']);
   $('edit_file').removeAttr('required');
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
    
    $('#edit_request_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
                
                
                if(typeof(data.error) != 'undefined' || data.error != null || data.error == true){
               
                    notification('error','','Request type already exists!');
                    create_ctr = 0;
                }else{
                create_ctr = 0;
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_request_crud','hide'); 
               drawTable();
                }
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
  
    
    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {

        if (result.isConfirmed) {
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
    }
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
    $('#edit_step_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
    $('#create_step_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
  
    
    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {

        if (result.isConfirmed) {
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
    }
    })


};

const createRequirement = () =>{
    $('#edit_requirement_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
    $('#create_requirement_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
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
  
    
    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {

        if (result.isConfirmed) {
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
        }
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
/*
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
*/
const generateService = (service_id, service_name) =>{
   


    $('.request_title').text(service_name);
    $('select').select2();
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

    

    Swal.fire({
        title: 'Loading..',
        showConfirmButton: false,
        backdrop: `rgba(0,0,121,0.2)`,
        didOpen: () => {
            Swal.showLoading()
 
          },

      })
    $.ajax({
        url: apiURL + 'requirements/request/'+service_id,
        async: true,
        method: 'GET',
        success: (data)=>{
            Swal.close();
            //
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
      //  showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
      //  denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
          //  denyButton: 'order-2',
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
                    //
                    'program' : $('#student_program').val(),
                },
                success: (data)=>{
                    //
                    $('#student_details').css('display','none');
                    $('input').val('');
                    $('select').val('');
                    $('#finish_step').css('display','block');
                   let message = `
                   Welcome to PUPQC-Academic-Services-Kiosk. Your ticket number is: ${code}. `;
            
       
                    if(student_no && student_no.length > 0){
                        message += `Student Number: ${student_no}`
                    }
                    //

                    //
                    let qr_code = new QRious({
                        element: document.getElementById('qr_code'),
                        value: message,//code,
                        level: 'L',//'M',
                        padding: 25,
                        size: 350,
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
            let today_ctr = 0;
            let month_ctr = 0;
            let week_ctr = 0;
            
 
            //
            data.data.map((val)=>{
                let value = moment(val.created_at).format("MMM Do YYYY");
                let now = moment(new Date()).format("MMM Do YYYY");

                if((val != null && typeof(val['created_at']) != 'undefined' &&
                new Date(val['created_at']).getFullYear() == new Date().getFullYear()) && val['ticket_status'] == 'Completed'){
               
                    if(value == now){
                        today.push(new Date(val.created_at).getDay());
                        today_services.push(val['requests'].request_type);
                        today_services2.push(val['requests'].request_type);
                        today_ctr += 1;
                    }
                    if(moment(val.created_at).format("MMM YYYY") == moment(new Date()).format("MMM YYYY")){
                        month.push(new Date(val.created_at).getDay());
                        month_services.push(val['requests'].request_type);
                        month_ctr += 1;
                      
                        if(new Date(val.created_at).getDate() >  new Date().getDate() - 7){
                            week.push(new Date(val.created_at).getDay());
                            week_services.push(val['requests'].request_type);
                            week_ctr += 1;
                     
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
            $('#today_count').html(today_ctr);

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
        
            $('#week_count').html(week_ctr);


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
            $('#month_count').html(month_ctr);
        
          
        }

    })

};


if((window.location.href).includes('/home')){
 $(document).ready(()=>{
       
    numDashboard();
})

}


const setSelect = () =>{
    let month_content = `<option value = 'All'>All</option>`;

    for(let i = 0; i <= 11; i++){
        month_content += `
        <option value = '${i}'>${months[i]}</option>
        `;
    }


    $('#month').append(month_content);

};

setSelect();

const selectRequest = (id) =>{
    let url = '';

    if($('#requests').val() == "All"){
        url = apiURL + 'submitted_requests';
        query_no = 0;
    }else{
        url = apiURL + 'submitted_requests/request/' + id;
        query_no = 1;
    }

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      }
                  ]
              }
            ],
                'ajax': {
                  
                    url: url,
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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
                        
                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};

const selectMonth = () =>{

    let url = '';

    if($('#month').val() == "All"){
        url = apiURL + 'submitted_requests';
        query_no = 0;
    }else{
        url = apiURL + 'submitted_requests/month';
        query_no = 2;
    }

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                     }
                  ]
              }
            ],
                'ajax': {
                  
                    url: url,
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};

const selectDay= () =>{

    query_no = 3;

    $('select').removeClass('text-primary');
    $('#date').addClass('text-primary');

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      }
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};

const selectRange = () =>{

    query_no = 4;
    
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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      } 
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};


//Charts
const createChart = () =>{

 
    
    let services = new Array();
    let service_values = new Array();

    $.ajax({
        url: apiURL + `submitted_requests`,
        method: "GET",
        headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
        dataType: "json",
        contentType: "application/json",
        success: (data)=>{
    
         if(data.data.length == 0){
            $('#today_report_none').css('display','block');
            $('#chart-1').css('display','none');
          
         }else{
            data.data.map((val)=>{

            let value = moment(val.created_at).format("MM D YYYY");
            let now = moment(new Date()).format("MM D YYYY");

            if(value == now && val['ticket_status'] == 'Completed'){
           
                if(services.includes(val['requests'].request_type)){
                    service_values[services.indexOf(val['requests'].request_type)] =
                    parseInt(service_values[services.indexOf(val['requests'].request_type)]) + 1;
                }else{
                    services.push(val['requests'].request_type);
                    service_values.push(1);
                }
            }
                        

                    });

            services.map((val,i)=>{
                services[i] = services[i] + ' (' + String(service_values[i]) + ')';
            })

            if(services.length == 0){
                $('#today_report_none').css('display','block');
                $('#chart-1').css('display','none');
                return;
            }
            // graph chart
            let graphChartCanvas = $('#chart-1').get(0).getContext('2d')
            
            
            let graphChartData = {
                labels: services,
                datasets: [
                {
                    label: 'Requests today',
                    fill: false,
                    borderWidth: 2,
                    lineTension: 0,
                    spanGaps: true,
                    borderColor: 'rgba(54, 162, 235)',//'gray',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    pointRadius: 3,


                    data: service_values,
                }
                ]
            }
            
            let graphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                display: false
                },
                scales: {
                y: {  
                    min: 0,
                    suggestedMax: 10,
                    step: 1,

                },
                x: {  
                    min: 0,
                    
                },

                }
            }
            

            let graphChart = new Chart(graphChartCanvas, { 
                type: 'bar', //'line',
                data: graphChartData,
                options: graphChartOptions
            })
            //chart:end
            }
        }
 
      
    });
    


    

}


if((window.location.href).includes('/home')){
    createChart();
}
   
const createChart2 = () =>{

 
    
    let services = new Array();
    let service_values = new Array();

    $.ajax({
        url: apiURL + `submitted_requests`,
        method: "GET",
        headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
        dataType: "json",
        contentType: "application/json",
        success: (data)=>{
        
         if(data.data.length == 0){
            $('#this_week_report_none').css('display','block');
            $('#chart-1').css('display','none');
          
         }else{
 
            data.data.map((val)=>{



            if(new Date(val.created_at).getDate() >  new Date().getDate() - 7 && val['ticket_status'] == 'Completed'){
                if(services.includes(val['requests'].request_type)){
                    service_values[services.indexOf(val['requests'].request_type)] =
                    parseInt(service_values[services.indexOf(val['requests'].request_type)]) + 1;
                }else{
                    services.push(val['requests'].request_type);
                    service_values.push(1);
                }
            }
                        

                    });

            services.map((val,i)=>{
                services[i] = services[i] + ' (' + String(service_values[i]) + ')';
             })
             
             if(services.length == 0){
                $('#this_week_report_none').css('display','block');
                $('#chart-2').css('display','none');
                return;
            }

            // graph chart
            let graphChartCanvas = $('#chart-2').get(0).getContext('2d')
            
            
            let graphChartData = {
                labels: services,
                datasets: [
                {
                    label: 'Requests this week',
                    fill: false,
                    borderWidth: 2,
                    lineTension: 0,
                    spanGaps: true,
                    borderColor: 'rgba(54, 162, 235)',//'gray',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    pointRadius: 3,


                    data: service_values,
                }
                ]
            }
            
            let graphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                display: false
                },
                scales: {
                y: {  
                    min: 0,
                    suggestedMax: 10,
                    step: 1,

                },
                x: {  
                    min: 0,
                    
                },

                },
                plugins: {
                    legend: {
                      position: 'top',
                    },

                  },
                  indexAxis: 'y',
            
            }
            

            let graphChart = new Chart(graphChartCanvas, { 
                type: 'bar', //'line',
                data: graphChartData,
                options: graphChartOptions
            })
            //chart:end
            }
        }
 
      
    });
    


    

}
if((window.location.href).includes('/home')){
    createChart2();
}




const createChart3 = () =>{

 
    
    let services = new Array();
    let service_values = new Array();

    $.ajax({
        url: apiURL + `submitted_requests`,
        method: "GET",
        headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
        dataType: "json",
        contentType: "application/json",
        success: (data)=>{
        
         if(data.data.length == 0){
            $('#this_month_report_none').css('display','block');
            $('#chart-3').css('display','none');
          
         }else{

            data.data.map((val)=>{



            if(moment(val.created_at).format("MMM YYYY") == moment(new Date()).format("MMM YYYY") && val['ticket_status'] == 'Completed'){
                if(services.includes(val['requests'].request_type)){
                    service_values[services.indexOf(val['requests'].request_type)] =
                    parseInt(service_values[services.indexOf(val['requests'].request_type)]) + 1;
                }else{
                    services.push(val['requests'].request_type);
                    service_values.push(1);
                }
            }
                        

                    });

            services.map((val,i)=>{
                services[i] = services[i] + ' (' + String(service_values[i]) + ')';
            })

            if(services.length == 0){
                $('#this_month_report_none').css('display','block');
                $('#chart-3').css('display','none');
                return;
            }

            // graph chart
            let graphChartCanvas = $('#chart-3').get(0).getContext('2d')
            
            
            let graphChartData = {
                labels: services,
                datasets: [
                {
                    label: 'Requests this month',
                    fill: false,
                    borderWidth: 5,//2,
                    lineTension: 0,
                    spanGaps: true,
                    borderColor: 'rgba(54, 162, 235)',//'gray',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    pointRadius: 3,


                    data: service_values,
                }
                ]
            }
            
            let graphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                display: false
                },
                scales: {
                y: {  
                    min: 0,
                    suggestedMax: 10,
                    step: 1,

                },
                x: {  
                    min: 0,
                    
                },

                },

            }
            

            let graphChart = new Chart(graphChartCanvas, { 
                type: 'line',
                data: graphChartData,
                options: graphChartOptions
            })
            //chart:end
            }
        }
 
      
    });
    


    

}
if((window.location.href).includes('/home')){
    createChart3();
}

let shift = false;
let capslock = false;
let mode = 'none';
$(".key").on('click', function(e){

    e.preventDefault();

    let input = $(this).text().trim();
    
    switch(input){
        case 'Backspace' : 
        $('input[type=text]').val($('input[type=text]').val().slice(0,-1));
        break;
        case 'CapsLock' : 
        mode = 'capslock';

        if(capslock == true){
            capslock = false;
            $(this).css('background-color','rgb(243, 243, 243)');
        }else{
            shift = false;
            capslock = true;
            //
            $('.leftshift').css('background-color','rgb(243, 243, 243)');
            $(this).css('background-color','lightgray');
        }
        break;
        case 'Shift' : 

        mode = 'shift';
        if(shift == true){
            shift = false;
            $(this).css('background-color','rgb(243, 243, 243)');
        }else{
            capslock = false;
            shift = true;
            //
            $('.capslock').css('background-color','rgb(243, 243, 243)');
            $(this).css('background-color','lightgray');
        }
        break;
        case 'Space': $('input[type=text]').val($('input[type=text]').val() + ' ');
        break;
        case 'Enter': showKeyboard('hide');
        break;
        default:
           // notification('info','',input);
           let modified_input = input;
           if(mode == 'shift'){
                if(shift == true){
                   if(input.length > 1){
                    modified_input =  input.charAt(2).toUpperCase();
                   }else{
                    modified_input =  input.charAt(0).toUpperCase();
                   }
                   
                }else{

                     modified_input =  input.charAt(0).toLowerCase();

                }
            }
            else if(mode == 'capslock'){
                if(capslock == true){
                    if(input.length > 1){
                        modified_input =  input.charAt(0).toUpperCase();
                    }else{
                        modified_input =  input.charAt(0).toUpperCase();
                    }
                }else{
                    modified_input =  input.charAt(0).toLowerCase();
                }
            }
    
            else if(mode == 'none'){


                modified_input =  input.charAt(0).toLowerCase();

            }
            

            $('input[type=text]').val($('input[type=text]').val() + modified_input);
        
        
        
    }
    
   
   
	//enter shift/backspace function here
});


const showForm = (id) =>{
  
    Swal.fire({
        title: 'Loading..',
        showConfirmButton: false,
        backdrop: `rgba(0,0,121,0.2)`,
        didOpen: () => {
            Swal.showLoading()
 
          },

      })
    $.ajax({
        url: apiURL + `forms/${id}`,
        method: "GET",
        headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
        dataType: "json",
        contentType: "application/json",
        success: (data)=>{
           Swal.close();
           //
            let ext = ``;
            let code = ``;
         
            if(data.data){
               $('#show_form_title').html(data.data.form_name);
                if(data.data.form_file_name != null){
                    ext = data.data.form_file_name.substr(-4);
                }
            
            if(ext.length > 0 && data.data.form_file_path != null && data.data.form_file_name != null){
                if(ext == "jpeg"){
                    code = `<img class = "mx-auto d-block"  src = "${baseURL}${data.data.form_file_path}${data.data.form_file_name}">`;
                }else{
                    if(ext.substr(-3) == "jpg" || ext.substr(-3) == "png" || ext.substr(-3) == "gif"){
                        code = `<img class = "mx-auto d-block" src = "${baseURL}${data.data.form_file_path}${data.data.form_file_name}">`;
                    }else if(ext.substr(-3) == "pdf" || ext.substr(-3) == "txt"){
                        code = `<iframe class = "mx-auto d-block" height = "800" width = "100%" src = "${baseURL}${data.data.form_file_path}${data.data.form_file_name}"></iframe>`;
                    }else{
                        code = `<h5 class = "text-center">Can't render the file due to file format</h5>`;
                    }
                }
            }else{
                code = `<h5  class = "text-center">No file uploaded for this form</h5>`;
            }
            }

            code += `
            <button class="btn btn-primary" onclick=
            "
                $('#form_list_container').html('');
                showElement('id','form_list','show');
                showElement('id','show_form','hide');
            "
            >Previous</button>

            <button class="btn btn-primary float-right"  onclick="
            showElement('id','show_form','hide');
            showElement('id','selected_service','show');
            generateService('${data.data.request_id}','${data.data.requests.request_type}');
            generateRequirement('${data.data.request_id}');
            ">Request</button>
            `;
            $('#show_form_container').append(code);
            //
  
        }
    })
};


const listForm = (id, request_title) =>{

    $('#form_request_title').html(request_title + ' Forms');
    Swal.fire({
        title: 'Loading..',
        showConfirmButton: false,
        backdrop: `rgba(0,0,121,0.2)`,
        didOpen: () => {
            Swal.showLoading()
 
          },

      })
    $.ajax({
        url: apiURL + `forms/request/${id}`,
        method: "GET",
        headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
        dataType: "json",
        contentType: "application/json",
        success: (data)=>{
            Swal.close();
            if(data.data.length != 0){
            let code = ``;
            data.data.map((val)=>{
              
              
                let img_url = baseURL + 'template/img/kiosk/icons/paper.png';

               
                code +=
                            `
            
            <div class="card shadow-md rounded ml-2">
            <div class = "card-body">

            <div class = "row">
            <div class = "col-md-2">
            <a href = "javascript:void(0);" onclick = "
            $('#show_form_container').html('');
            showElement('id','show_form','show');
            showElement('id','form_list','hide');
            showForm('${val.id}');
            ">
            
            <img class="d-block w-40 img-thumbnail border-0" src="${img_url}" >
            


            </a>
            </div>
            <div class = "col-md-10">
            <a class = "nav-link text-center" href = "javascript:void(0);" onclick = "
            $('#show_form_container').html('');
            showElement('id','show_form','show');
            showElement('id','form_list','hide');
            showForm('${val.id}');
            ">
            <h4 class = 'request_title mt-5 float-left' >${val.form_name}</h4>
            </a>
            </div>
            </div>



            </div>
            </div>
                `
            }).join("");
            $('#form_list_container').append(code);
        }else{
            $('#form_list_container').append("<h5 class = 'text-center'>No forms to show</h5>");
            
        }
    }
    })
   
};

//


const createForm = () =>{
    $('#edit_form_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
    $('#create_form').on('submit',(e)=>{

        e.preventDefault();
        
        if (create_ctr > 0) {
            return;
        }
        create_ctr++;
        let form_data = new FormData(document.getElementById('create_form'));
        
       
        $.ajax({
            url: apiURL + 'forms',
            async: true,
            method: 'POST',
            data: form_data,

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
               manageCard('create_form_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })


};



const deleteForm = (data) =>{
    //view
    let values = JSON.parse(data);
  

    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
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
            $.ajax({
                url: apiURL + 'forms/delete/' + values['id'],
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

        }
      })



};

const editForm = (data) =>{
    $('#create_form_crud').css('display','none');
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
    //view


    let values = JSON.parse(data);
    console.log(values)
    $('#edit_form_name').val(values['form_name']);
    $('#edit_type').val(values['request_id']);
    $('#edit_source').val(values['source']);
    $('edit_file').removeAttr('required');
    if(values['form_file_path'] && values['form_file_name']){
        $("#placeholder").attr(
            "src",
            `${baseURL}${values['form_file_path']}/${values['form_file_name']}`
        );
    }else{
        $("#placeholder").attr(
            "src",
            placeholder_src
        );
    }
    


    $('#edit_form').on('submit',(e)=>{

        e.preventDefault();

        let form_data = new FormData(document.getElementById('edit_form'));
    


        $.ajax({
            url: apiURL + 'forms/update/' + values['id'],
            async: true,
            method: 'POST',
            data: form_data,

            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            //for file
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: (data)=>{
             

                notification('success','','Successfully updated');
                //location.reload();
                manageCard('edit_form_crud','hide');
                drawTable();
            },
            error:({responseJSON})=>{
                console.log(responseJSON);
                notification('error','','Something went wrong');
            }
        });
    })


};

const showFile = (url) => {
    // console.log(url)
     let ext = url.name.substring(url.name.lastIndexOf(".") + 1).toLowerCase();
     if ((ext == "jpeg" || ext == "jpg" || ext == "png" || ext == "pdf" || ext == "txt")) {
         let reader = new FileReader();
 
         reader.onload = (e) =>{
             $("#placeholder").attr("src", e.target.result);
         };
 
         reader.readAsDataURL(url);
     } else{
         notification('error','','This file type is not accepted!');
     }
 };
 
 const loadStudentNo =() =>{
    let ids = new Array();
    $.ajax({
        url: apiURL + 'submitted_requests',
        method: 'GET',
        headers: {
            Authorization: 'Bearer ' + sessionStorage.getItem('token'),
        },
        success: (data)=>{
            let code = `<option value = 'None'>No given student number</option>`;

            data.data.map((val)=>{
                if(val.student_number != null){
                    if(!ids.includes(val.student_number)){
                        code += `<option value = '${val.student_number}'>${val.student_number}</option>`;
                        ids.push(val.student_number);
                    }
                  
                }
                
            }).join("");
            $('#student_no').append(code);
        }
    })
 };

 loadStudentNo();

 const selectUser = () =>{
    let url = '';

    if($('#student_no').val() == "All"){
        url = apiURL + 'submitted_requests';
        query_no = 0;
    }else if($('#student_no').val() == "None" || $('#student_no').val() == "N/A"){
        url = apiURL + 'submitted_requests/no_user';
        query_no = 5;
    }else{
        url = apiURL + 'submitted_requests/user/' + $('#student_no').val();
        query_no = 5;
    }

    $('select').removeClass('text-primary');
    $('#student_no').addClass('text-primary');

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      }
                  ]
              }
            ],
                'ajax': {
                  
                    url: url,
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};


const selectReport = () =>{
    let url = '';

    if($('#report').val() == "All"){
        url = apiURL + 'submitted_requests';
        query_no = 0;
    }else if($('#report').val() == "Weekly" || $('#report').val() == "weekly"){
        url = apiURL + 'submitted_requests/this_week';
        query_no = 6;
    }else if($('#report').val() == "Monthly" || $('#report').val() == "monthly"){
        url = apiURL + 'submitted_requests/this_month';
        query_no = 6;
    }

    $('select').removeClass('text-primary');
    $('#report').addClass('text-primary');

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      }
                  ]
              }
            ],
                'ajax': {
                  
                    url: url,
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};

const printTicket = () =>{
    if($('#guest_header1')){
        $('#guest_header1').css('display','none');
    }else{
        $('#guest_header2').css('display','none');
    }
    $('button').css('display','none');
    $('.section-header-breadcrumb').css('display','none');
    $('footer').css('display','none');
    window.print();

    setTimeout(function() {
        window.location.reload()
    }, 100);
};


const setStatus = (id) =>{
    Swal.fire({
        title: 'Set a status',
        icon: 'info',
        input: 'select',
        inputOptions: {
        'Void': 'Void',
        'Cancelled': 'Cancelled',
        'Completed': 'Completed',
        
        },
        inputPlaceholder: 'Select a status..',
      //  showCancelButton: true,
        confirmButtonText: 'Submit',

      }).then((result) => {
        if(result.value.length <= 0){
            Swal.fire({
                title: 'Select an option first!',
                icon: 'error',

              //  showCancelButton: true,
                confirmButtonText: 'Ok',
        
              })
        }else if (result.isConfirmed) {
            $.ajax({
                url: apiURL + 'submitted_requests/set_status/' + id,
                async: true,
                method: 'POST',
                data: {
                    'ticket_status' : result.value
                },
                headers: {
                    'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
                },
                success: (data)=>{
                 
                    Swal.fire({
                        title: 'Successfully updated!',
                        icon: 'success',
        
                      //  showCancelButton: true,
                        confirmButtonText: 'Ok',
                
                      })
                   //location.reload();
                  drawTable();
                },
                error:({responseJSON})=>{
                console.log(responseJSON);
                  notification('error','','Something went wrong');
                }
            });

        }
      })

};

const showInfo = (val) =>{


    Swal.fire({
        title: 'Loading..',
        showConfirmButton: false,
        backdrop: `rgba(0,0,121,0.2)`,
        didOpen: () => {
            Swal.showLoading()
 
          },

      })
    $.ajax({
        url: apiURL + 'clients/student_number/' + val,
        async: true,
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
        },
        success: (data)=>{
            if(val == 'N/A'){
                Swal.close();
                Swal.fire({
                    title: 'Please select a student number first!',
                    icon: 'error',
                    showConfirmButton: true,
                  })
            }else{
            $('#student_details').css('display','block');
            if(typeof(data.data[0]) != 'undefined' || data.data[0] != null){
                if(data.data[0].contact_number){
                    $('#student_contact_number').val(" " + data.data[0].contact_number);
                }else{
                    $('#student_contact_number').val("Not available");
                }
                if(data.data[0].year_level){
                    $('#student_year').val(" " + data.data[0].year_level);
                }else{
                    $('#student_year').val("Not available");
                }
                if(data.data[0].program){
                    $('#student_program').val(" " + data.data[0].program);
                }else{
                    $('#student_program').val("Not available");
                }
                if(data.data[0].first_name && data.data[0].last_name){
                    $('#student_name').val(" " + data.data[0].first_name + " " + data.data[0].last_name);
                }else{
                    $('#student_name').val("Not available");
                }
            }else{
                $('#student_contact_number').html("Not available");
                $('#student_program').val("Not available");
                $('#student_year').val("Not available");
                $('#student_name').val("Not available");
            }
            }
            Swal.close();
        }
    })
};


const selectStatus = (val) =>{
    let url = '';
    let data = '';
    let method = '';
    if($('#statuses').val() == "All"){
        url = apiURL + 'submitted_requests';
        method = 'GET';
        query_no = 0;
    }else{
        url = apiURL + 'submitted_requests/ticket_status/';
        method = 'POST';
        data = {
            'ticket_status' : val,
        };
        query_no = 7;
    }

    $('select').removeClass('text-primary');
    $('#statuses').addClass('text-primary');

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      }
                  ]
              }
            ],
                'ajax': {
                  
                    url: url,
                    type: method,
                    data: data,
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};
const loadProgram = () =>{
$.ajax({
    url: apiURL + 'clients',
    method: 'GET',
    headers: {
        Authorization: `Bearer ${sessionStorage.getItem('token')}`
    },
    success: (data)=>{
        let code = ``;
        let arr = new Array();

        data.data.map((val)=>{
            if(!arr.includes(val.program)){
                code += `<option value = '${val.program}'>${val.program}</option>`;
                arr.push(val.program);
            }
        
        }).join("");

        $('#programs').append(code);
    }
})
};
loadProgram();

const selectProgram = (val) =>{
    let url = '';
    let data = '';
    let method = '';
    if($('#programs').val() == "All"){
        url = apiURL + 'submitted_requests';
        method = 'GET';
        query_no = 0;
    }else{
        url = apiURL + 'submitted_requests/program/';
        method = 'POST';
        data = {
            'program' : val,
        };
        query_no = 8;
    }

    $('select').removeClass('text-primary');
    $('#programs').addClass('text-primary');

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
                      'print',
                      {
                        text: 'Print Report',
                        action: function ( e, dt, node, config ) {
                            printReport();
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false,
                        }],
                      }
                  ]
              }
            ],
                'ajax': {
                  
                    url: url,
                    type: method,
                    data: data,
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
                            if(data['reference_number'] == null || data['reference_number'] == 'N/A'){
                                return `<a>No reference given</a>`;
                            }else{
                                return data['reference_number'];
                            }
                        }
                      },
                  
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

                        if(
                            data['ticket_status'] == null ||
                            (moment(data['created_at']).format("MMM Do YYYY") == moment(new Date()).format("MMM Do YYYY")
                            && (data['ticket_status'] != 'Completed' && data['ticket_status'] != 'Cancelled')
                            )
                            || data['ticket_status'] == 'N/A' || 
                            data['ticket_status'] == 'Void' || data['ticket_status'] == 'void'
                        )
                        { return `<span class="badge badge-danger">Void</span>`; }
                        else if(data['ticket_status'] == 'Cancelled' || data['ticket_status'] == 'cancelled') 
                        { return `<span class="badge badge-secondary">Cancelled</span>`; }
                        else if(data['ticket_status'] == 'Completed' || data['ticket_status'] == 'completed') 
                        { return `<span class="badge badge-success">Completed</span>`; }
                        else
                        { return `<span class="badge badge-info">Pending</span>`; }
                      
                     }
                  },
                  {
                    'data': (data,type,row)=>{
                        return moment(data['created_at']).format("MMM Do YYYY");
                    }
                  },
                  {
                    'data': (data,type,row)=>{
                        return `
                        <div class="text-center dropdown">
                        <!-- Dropdown Toggler --> 
                        <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                        <i class="fas fa-ellipsis-v"></i>
                        </div>

                        <!-- Dropdown Menu --> 
                        <div class="dropdown-menu dropdown-menu-right"> 

                        <div class="dropdown-item d-flex" role="button" onclick = "setStatus('${data.id}');">
                        <div style="width: 2rem">
                        <i class="fas fa-edit mr-1"></i>
                        </div>
                        <div>Set Status</div>
                        </div> 
                        <!----> 
                        </div>

                        </div>
                    </div>
                        
                        `
                    }
                  },
                ]
            })

            
      
  
};


const deleteStudent = (id) =>{
  

  
    
    Swal.fire({
        title: 'Delete?',
        showDenyButton: true,
      //  showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-3',
            denyButton: 'order-2',
          }
      }).then((result) => {

        if (result.isConfirmed) {
        $.ajax({
            url: apiURL + 'clients/delete/' + id,
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
    }
    })


};


const createStudent = () =>{
   
    $('input').val('');
    $('select').val('');
    $('textarea').val('');
    //
    $('#create_student').on('submit',(e)=>{

        e.preventDefault();
        if (create_ctr > 0) {
            return;
        }
        create_ctr++;
        $.ajax({
            url: apiURL + 'clients',
            async: true,
            method: 'POST',
            data: {
                'created_by' : sessionStorage.getItem('user_id'),
                //
                'first_name' : $('#create_first_name').val(),
                'middle_name' :  $('#create_middle-number').val() ? $('#create_middle_number').val() : '' ,
                'last_name' : $('#create_last_name').val(),
                'extension_name' : $('#create_extension_number').val() ? $('#create_extension_number').val() : '' ,
                'program' : $('#create_program').val(),
                'year_level' : $('#create_year_level').val(),
                'student_number' : $('#create_student_number').val(),
                'contact_number' : $('#create_contact_number').val() ? $('#create_contact_number').val() : 'Not Available' ,
            },
            headers: {
                'Authorization': 'Bearer ' + sessionStorage.getItem('token'),
            },
            success: (data)=>{
                
       
                create_ctr = 0;
                notification('success','','Successfully created');
               // location.reload();
               manageCard('create_student_crud','hide'); 
               drawTable();
            },
            error:({responseJSON})=>{
               // console.log(responseJSON.message);
               notification('error','','Something went wrong');
            }
        });
    })


};

//Charts
const createChart0 = () =>{

    Swal.fire({
        title: 'Loading..',
        showConfirmButton: false,
        backdrop: `rgba(0,0,121,0.2)`,
        didOpen: () => {
            Swal.showLoading()
 
          },

      })
    

    let status = new Array();
    let status_values = new Array();
    let pending_today = 0;
    let completed_this_month = 0;
    let total_void = 0;

    $.ajax({
        url: apiURL + `submitted_requests`,
        method: "GET",
        headers: {
            Authorization: `Bearer ${sessionStorage.getItem('token')}`,
        },
        dataType: "json",
        contentType: "application/json",
        success: (data)=>{
    
         if(data.data.length == 0){
            $('#today_report_none').css('display','block');
            $('#chart-0').css('display','none');
          
         }else{
            data.data.map((val)=>{
            //
            if(status.includes(val['ticket_status'])){
                status_values[status.indexOf(val['ticket_status'])] =
                parseInt(status_values[status.indexOf(val['ticket_status'])]) + 1;
            }else{
                status.push(val['ticket_status']);
                status_values.push(1);
            }
            //


            if(moment(val.created_at).format("MM D YYYY") == moment(new Date()).format("MM D YYYY")){
                if(val['ticket_status'] == 'Pending'){
                    pending_today += 1;
                }
            }
            if(moment(val.created_at).format("MM YYYY") == moment(new Date()).format("MM YYYY")){
                if(val['ticket_status'] == 'Completed'){
                    completed_this_month += 1;
                }
            }  

                if(val['ticket_status'] == 'Void' || val['ticket_status'] == null ){
                    total_void += 1;
                }             

                    });

            status.map((val,i)=>{
                status[i] = status[i] + ' (' + String(status_values[i]) + ')';
            })

            if(status.length == 0){
                $('#today_report_none').css('display','block');
                $('#chart-0').css('display','none');
                return;
            }

            $('#pending_today_count').html(pending_today);
            $('#completed_this_month_count').html(completed_this_month);
            $('#void_count').html(total_void);
            // graph chart
            let graphChartCanvas = $('#chart-0').get(0).getContext('2d')
            
            
            let graphChartData = {
                labels: status,
                datasets: [
                {
                    label: 'Status',
                    fill: false,
                    borderWidth: 2,
                    lineTension: 0,
                    spanGaps: true,
                                           backgroundColor     : ['rgba(54, 162, 235, 0.2)',
                       
                        'rgba(255, 205, 86, 0.2)','rgba(255, 99, 132, 0.2)',
                        'rgba(153, 102, 255, 0.2)','rgba(60,141,188,0.2)'],
                        borderColor         : ['rgba(54, 162, 235)',
                      
                        'rgba(255, 205, 86)','rgba(255, 99, 132)',
                        'rgba(153, 102, 255)','rgba(60,141,188)'],
                    pointRadius: 3,


                    data: status_values,
                }
                ]
            }
            
            let graphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                display: false
                },
                scales: {
                y: {  
                    min: 0,
                    suggestedMax: 10,
                    step: 1,

                },
                x: {  
                    min: 0,
                    
                },

                }
            }
            

            let graphChart = new Chart(graphChartCanvas, { 
                type: 'doughnut',
                data: graphChartData,
                options: graphChartOptions
            })
            //chart:end
            
            }

            Swal.close();
        }
 
      
    });
    


    

}


if((window.location.href).includes('/home')){
    createChart0();
}
