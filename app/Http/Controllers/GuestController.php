<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Requests;
class GuestController extends Controller
{
    //
    public function index()
    {
        $requests = Requests::where('status',1)->get();
        return view('client.home', [
            'requests' => $requests
        ]);
       
    }
}
