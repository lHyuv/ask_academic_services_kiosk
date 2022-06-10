<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Request as Requests;
use App\Models\Client;
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
        return view('home');
    }

    public function test(){
        return view('test');
    }

    public function request_service_home(){
        return view('client.request_service_home');
    }

    public function backlog(){
        return view('backlog');
    }

    public function pending_services(){
        return view('other_users.pending_services');
    }

    public function request_service(){
        return view('client.request_service_form');
    }

    public function overload_form(){
        return view('service_forms.overload_form');
    }

    public function ace_add_form(){
        return view('service_forms.ace_add_form');
    }
    public function ace_change_form(){
        return view('service_forms.ace_change_form');
    }

    public function completion_form(){
        return view('service_forms.completion_form');
    }

    public function view_profile(){
        $my_data = Client::where('user_id', Auth::user()->id)->first();
       // dd($my_data);
        return view('profile',[
            'my_data' => $my_data
        ]);
    }

    public function ongoing_services(){
        return view('client.ongoing_services');
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

    public function request_crud(){
        $requests = Requests::where('status',1)->get();
        return view('setup.requests',[
            'requests' => $requests
        ]);
    }
}
