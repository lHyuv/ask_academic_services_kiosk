<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'Inactive']);

        //return $user;
    }
}
