<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
 
    public function show_active()
    {
        return User::where('status','1')->get();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function create(Request $request)
    {
        return User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
      
        ]);

    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $user = User::findOrFail($id);
       // $user->update($request->all());
        $user->update([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => '2']);

        //return $user;
    }
}
