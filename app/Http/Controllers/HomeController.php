<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.home');
       
    }

    public function test(){
        return view('test');
    }

    public function request_service_home(){
        return view('client.home');
    }

    public function backlog(){
        return view('admin.backlog');
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
}
