<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserType;

class UserTypeController extends Controller
{
    public function index()
    {
        return UserType::all();
    }
 
    public function show_active()
    {
        return UserType::where('status','Active')->get();
    }

    public function show($id)
    {
        return UserType::find($id);
    }

    public function create(Request $request)
    {
        //request()->validate([...=>...]); //Enter validation here
        return UserType::create($request->all());
    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $usertype = UserType::findOrFail($id);
        $usertype->update($request->all());

        return $usertype;
    }

    public function delete(Request $request, $id)
    {
        $usertype = UserType::findOrFail($id);
        $usertype->update(['status' => 'Inactive']);

        //return $usertype;

    }
}
