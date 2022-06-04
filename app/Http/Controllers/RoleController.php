<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
 
    public function show_active()
    {
        $data = Role::where('status','1')->get();
        
        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id)
    {
        $data = Role::find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }
        //
        //request()->validate([...=>...]); //Enter validation here
        $data = Role::create($request->all());
        
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $Role = Role::findOrFail($id);
        $Role->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $Role
        ];
    }

    public function delete(Request $request, $id)
    {
        $Role = Role::findOrFail($id);
        $Role->update(['status' => '2']);

        //return $Role;
        return [
            'message' => 'Successfully deleted'
        ];

    }
}
