@extends('layouts.header')

@section('page_title')
    {{ "Students" }}
@endsection

@section('content')

<div class="container">


<section class="section shadow-sm">
        <div class="section-header mt-5">
       
            <h1>Students</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="/home">Home</a></div>
              <div class="breadcrumb-item">Students</div>
            </div> 
        </div>
      
</section>

         <!---->

         <div class="card card-outline card-primary mt-5" id = "create_student_crud" style = 'display:none;'>
                <div class="card-header"><h4>Student details</h4></div>

                <div class="card-body">
                    <div class = "row">
                    <div class = "col-md-12">
                    <form action="" method = "" id = "create_student" name = "create_student">

                        <div class = "row">
                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>First Name &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="text" name = "first_name" id = "create_first_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Middle Name </label>
                        <input type="text" name = "middle_name" id = "create_middle_name" class = "form-control" placeholder = ""/>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Last Name &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="text" name = "last_name" id = "create_last_name" class = "form-control" placeholder = "" required/>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Extension Name</label>
                        <input type="text" name = "extension_name" id = "create_extension_name" class = "form-control" placeholder = ""/>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Year &nbsp;<code class = 'text-danger'>*</code></label>
                        
                        <select name = "year_level" id = "create_year_level"class = "form-control" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Program &nbsp;<code class = 'text-danger'>*</code></label>
                     
                       <select name="program" id="create_program" class = "form-control" required>
                            <option value="Bachelor in Business Teacher Education">Bachelor in Business Teacher Education</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Public Administration major in Public Financial Management">Bachelor of Public Administration major in Public Financial Management</option>
                            <option value="Bachelor of Science in Business Administration major in Marketing Management">Bachelor of Science in Business Administration major in Marketing Management</option>
                            <option value="Bachelor of Science in Entrepreneurial Management">Bachelor of Science in Entrepreneurial Management</option>
                            <option value="Bachelor of Business Administration">Bachelor of Business Administration</option>
                            <option value="Bachelor of Science in Business Administration major in Human Resource Development Management">Bachelor of Science in Business Administration major in Human Resource Development Management</option>
                       </select>
                        </div>
                        </div>


                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Student Number &nbsp;<code class = 'text-danger'>*</code></label>
                        <input type="text" name = "student_number" id = "create_student_number" class = "form-control"  placeholder = "20XXX-00XXX-XX-X" required/>
                        </div>
                        </div>

                        <div class = "col-md-12">
                        <div class="form-group">
                        <label>Contact Number </label>
                        <input type="text" name = "contact_number" id = "create_contact_number" class = "form-control" placeholder = ""/>
                        </div>
                        </div>
                        </div>
                    

                 
                     
                        <div class="float-right">
                        <button class = "btn btn-secondary" type = "button" onclick = "manageCard('create_student_crud','hide');" >Cancel</button>
                        <button class = "btn btn-primary" type = "submit" >Create</button>
                        </div>
                    </form>
                </div>
            </div>
   
            </div>
        </div>

         <!---->
       
<!--Hidden card:end-->
    <div class="row">
        <div class="col-md-12">

            <div class="card card-outline card-primary ">
                <div class="card-header">
                    <div class = "col-md-10">
                    <h4>List of Students</h4>
                    </div>
                    <div class = "col-md-2">
                    <button class = "btn btn-primary float-right"  onclick = "manageCard('create_student_crud','show');createStudent();">+ Add</button>
                    </div>
                 </div>

                <div class="card-body">
                    <table class = "table table-striped">
                        <thead>
                            <tr>
                                <th>Student Number</th>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Program</th>
                                <th>Contact Number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                        <tr>
                                <td>
                                    @if(is_null($client->student_number) || $client->student_number == 'N/A')
                                    <i>Not Available</i>
                                    @else
                                    {{ $client->student_number}}
                                    @endif
                                </td>
                                <td>
                                    
                                    @if(is_null($client->first_name) ||  is_null($client->last_name))
                                    <i>Not Available</i>
                                    @else
                                    {{ $client->first_name}}  {{$client->middle_name}} {{$client->last_name}} {{$client->extension_name }}
                                    @endif
                                </td>
                                <td>
                                    
                                    @if(is_null($client->year_level) || $client->year_level == 'N/A')
                                    <i>Not Available</i>
                                    @else
                                    {{ $client->year_level}}
                                    @endif
                                </td>
                                <td>
                                 
                                    @if(is_null($client->program) || $client->program == 'N/A')
                                    <i>Not Available</i>
                                    @else
                                    {{ $client->program}}
                                    @endif
                                
                                </td>
                                <td>
                                
                                    @if(is_null($client->contact_number) || $client->contact_number == 'N/A')
                                    <i>Not Available</i>
                                    @else
                                    {{ $client->contact_number}}
                                    @endif
                                </td>
                                <td>
                             
                                @if($client->status == '1')
                                <span class="badge badge-success">Active</span>
                                @else
                                <span class="badge badge-warning">Inactive</span>
                                @endif
                                </td>
                                <td>
                                   
                                   <div class="text-center dropdown">
                                   <!-- Dropdown Toggler --> 
                                   <div class="btn btn-sm btn-default" data-toggle="dropdown" role="button">
                                   <i class="fas fa-ellipsis-v"></i>
                                   </div>

                                   <!-- Dropdown Menu --> 
                                   <div class="dropdown-menu dropdown-menu-right"> 
                               

                                   <!----> 
                                   <div class="dropdown-item d-flex" role="button" onclick = "deleteStudent('{{$client->id}}');" >
                                   <div style="width: 2rem">
                                   <i class="fas fa-trash mr-1"></i>
                                   </div>
                                   <div>Delete</div>
                                   </div> 
                                   <!----> 
                                   </div>

                                   </div>
                               </div>
                               </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
   

         <!---->
         

    </div>
</div>
<script>
$(document).ready(()=>{
    $("table").dataTable({
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

                      ]
                  }
                ],
    });
})
//catch datatable ini error
$.fn.dataTable.ext.errMode = ( settings, help, msg ) => { 
    console.log(msg);
};
</script>
@endsection


