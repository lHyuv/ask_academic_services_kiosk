<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;

class RequirementController extends Controller
{
    public function index()
    {
        $data = Requirement::all();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
 
    public function show_active()
    {
        $data = Requirement::where('status','1')->get();
        
        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id)
    {
        $data = Requirement::find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request)
    {
        //request()->validate([...=>...]); //Enter validation here
        $data = Requirement::create($request->all());
        
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $Requirement = Requirement::findOrFail($id);
        $Requirement->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $Requirement
        ];
    }

    public function delete(Request $request, $id)
    {
        $Requirement = Requirement::findOrFail($id);
        $Requirement->update(['status' => '2']);

        //return $Requirement;
        return [
            'message' => 'Successfully deleted'
        ];

    }
}
