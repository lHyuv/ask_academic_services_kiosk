<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();
    }
 
    public function show_active()
    {
        return Role::where('status','1')->get();
    }

    public function show($id)
    {
        return Role::find($id);
    }

    public function create(Request $request)
    {
        //request()->validate([...=>...]); //Enter validation here
        return Role::create($request->all());
    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $Role = Role::findOrFail($id);
        $Role->update($request->all());

        return $Role;
    }

    public function delete(Request $request, $id)
    {
        $Role = Role::findOrFail($id);
        $Role->update(['status' => '2']);

        //return $Role;

    }
}
