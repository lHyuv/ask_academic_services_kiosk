<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Requests;

class RequestController extends Controller
{
    //
    public function index(){
        $data = Requests::all();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = Requests::where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = Requests::find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request){
        $data =  Requests::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $request_data = Requests::findOrFail($id);
        $request_data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $request_data
        ];  
    }

    public function delete(Request $request, $id){
        $request_data = Requests::findOrFail($id);

        $request_data->update([
            'status' => '2'
        ]);

        //return $request_data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

}
