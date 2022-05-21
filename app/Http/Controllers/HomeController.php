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
        return view('request_service_home');
    }

    public function backlog(){
        return view('backlog');
    }

    public function pending_services(){
        return view('pending_services');
    }
}
