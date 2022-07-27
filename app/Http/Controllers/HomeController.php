<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Request as Requests;
use App\Models\Client;
use App\Models\Step;
use App\Models\Requirement;
use App\Models\SubmittedRequest;
use App\Models\AceRequest;
use App\Models\TaggedModel;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       

       // dd($today_requests);
       $submitted_requests = SubmittedRequest::where('status',1)->get();
                        
       $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')->count();

       $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')->count();

       return view('admin.home',[
           'submitted_requests' => $submitted_requests,
           'pending' => $pending,
           'completed'=>$completed,
       ]);
       
    }

    public function test(){
        return view('test');
    }

    public function request_service_home(){
        return view('client.home');
    }

    public function backlog(){
        $submitted_requests = SubmittedRequest::where('status',1)->orderBy('created_at')->get();
        $requests = Requests::where('status',1)->get();
        /*
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_by)->format('d');
        });
        */
    // dd($submitted_requests);
        return view('admin.backlog',[
            'submitted_requests' => $submitted_requests,
            'requests' => $requests,
        ]);
    }

    public function view_profile(){
        return view('profile');
    }
 
    public function user_crud(){
        $users = User::where('status',1)->get();
        $roles = Role::where('status',1)->get();
        return view('admin.user', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function role_crud(){
        $roles = Role::where('status',1)->get();
        return view('admin.role', [
            'roles' => $roles
        ]);
    }

    public function user_role_crud(){
        $userroles = UserRole::where('status',1)->get();
        $users = User::where('status',1)->get();
        $roles = Role::where('status',1)->get();
        return view('admin.user_role', [
            'userroles' => $userroles,
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    public function request_crud(){
        $requests = Requests::where('status',1)->get();
        return view('setup.requests',[
            'requests' => $requests
        ]);
    }

    public function step_crud(){
        $steps = Step::where('status',1)->get();
        $requests = Requests::where('status',1)->get();
        return view('setup.steps',[
            'steps' => $steps,
            'requests' => $requests
        ]);
    }

    public function requirement_crud(){
        $requirements = Requirement::where('status',1)->get();
        $requests = Requests::where('status',1)->get();
        return view('setup.requirements',[
            'requirements' => $requirements,
            'requests' => $requests
        ]);
    }

    public function form_crud(){
        $forms = Form::where('status',1)->get();
        $requests = Requests::where('status',1)->get();
        return view('setup.forms',[
            'forms' => $forms,
            'requests' => $requests
        ]);
    }
   
   
    /*
    Request IDs for Reference:

    1081d3a5-2e0a-434b-a745-b3e15b6beed7 Subject Tutorial
    22a6d202-bf42-45dc-802a-efb490b69ca6 Cross-enrollment
    347b20bb-27d5-423b-8903-0c97957ff01b Change Subject
    68a2b350-7d68-460b-bf83-7f3de12c387b Subject Petition
    74c59164-1ca1-4916-b455-9eed9ec527af Correction
    7ed558b5-0a86-43d5-b83d-db4e468ded5f Certification
    a362ccad-5867-47b6-9895-1db6b201ec02 Shifting
    a4db111e-dbb9-45d1-b0fc-9a3eca2fc812 Manual Enrollment
    aefb014d-a83e-42e1-b67f-b05e99e92ff2 Add Subject
    bf3aeb08-1764-4f40-8b16-932e93db5359 Subject Overload
    */

    //
    public function subject_tutorial(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','1081d3a5-2e0a-434b-a745-b3e15b6beed7')->get();
   

        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','1081d3a5-2e0a-434b-a745-b3e15b6beed7')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','1081d3a5-2e0a-434b-a745-b3e15b6beed7')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
   
        ]);
    }


    public function cross_enrollment(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','22a6d202-bf42-45dc-802a-efb490b69ca6')->get();

        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','22a6d202-bf42-45dc-802a-efb490b69ca6')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','22a6d202-bf42-45dc-802a-efb490b69ca6')->count();
        
        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','1081d3a5-2e0a-434b-a745-b3e15b6beed7')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function change_subject(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','347b20bb-27d5-423b-8903-0c97957ff01b')->get();
   
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','347b20bb-27d5-423b-8903-0c97957ff01b')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','347b20bb-27d5-423b-8903-0c97957ff01b')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function subject_petition(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','68a2b350-7d68-460b-bf83-7f3de12c387b')->get();
      
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','68a2b350-7d68-460b-bf83-7f3de12c387b')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','68a2b350-7d68-460b-bf83-7f3de12c387b')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function correction(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','74c59164-1ca1-4916-b455-9eed9ec527af')->get();
         
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','74c59164-1ca1-4916-b455-9eed9ec527af')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','74c59164-1ca1-4916-b455-9eed9ec527af')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function certification(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','7ed558b5-0a86-43d5-b83d-db4e468ded5f')->get();
            
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','7ed558b5-0a86-43d5-b83d-db4e468ded5f')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','7ed558b5-0a86-43d5-b83d-db4e468ded5f')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function shifting(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','a362ccad-5867-47b6-9895-1db6b201ec02')->get();
               
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','a362ccad-5867-47b6-9895-1db6b201ec02')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','a362ccad-5867-47b6-9895-1db6b201ec02')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function manual_enrollment(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','a4db111e-dbb9-45d1-b0fc-9a3eca2fc812')->get();
                  
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','a4db111e-dbb9-45d1-b0fc-9a3eca2fc812')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','a4db111e-dbb9-45d1-b0fc-9a3eca2fc812')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function add_subject(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','aefb014d-a83e-42e1-b67f-b05e99e92ff2')->get();
                     
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','aefb014d-a83e-42e1-b67f-b05e99e92ff2')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','aefb014d-a83e-42e1-b67f-b05e99e92ff2')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    public function subject_overload(){
        $submitted_requests = SubmittedRequest::where('status',1)
        ->where('request_id','bf3aeb08-1764-4f40-8b16-932e93db5359')->get();
                        
        $pending = SubmittedRequest::where('status',1)->where('ticket_status','Pending')
        ->where('request_id','bf3aeb08-1764-4f40-8b16-932e93db5359')->count();

        $completed = SubmittedRequest::where('status',1)->where('ticket_status','Completed')
        ->where('request_id','bf3aeb08-1764-4f40-8b16-932e93db5359')->count();
        
        return view('admin.reports',[
            'submitted_requests' => $submitted_requests,
            'pending' => $pending,
            'completed'=>$completed,
        ]);
    }

    //

    public function students(){
        $clients = Client::where('status',1)->get();

        
        return view('admin.students',[
            'clients' => $clients,

        ]);
    }
}
