<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function view_profile(){
        return view('profile');
    }

    public function ongoing_services(){
        return view('client.ongoing_services');
    }
}
