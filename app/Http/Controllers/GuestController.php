<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Requests;
class GuestController extends Controller
{
    //
    public function index()
    {
        $requests = Requests::where('status',1)->orderBy('created_at', 'ASC')->paginate(5);
        $full_requests = Requests::where('status',1)->get();
        return view('client.home', [
            'requests' => $requests,
            'full_requests' => $full_requests,
        ]);
       
    }

    public function no_script()
    {
        return view('noscript');
    }
}
