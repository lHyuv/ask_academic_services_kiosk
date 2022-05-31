<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
 
    public function show_active()
    {
        return User::where('status','Active')->get();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function create(Request $request)
    {
        //request()->validate([...=>...]); //Enter validation here
        //$user->update($request->all());
        return User::create([
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'user_type_id' => request('user_type_id')
        ]);
    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $user = User::findOrFail($id);
       // $user->update($request->all());
        $user->update([
            'username' => request('username'),
            'password' => Hash::make(request('password')),
            'user_type_id' => request('user_type_id')
        ]);
        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'Inactive']);

        //return $user;
    }
}
