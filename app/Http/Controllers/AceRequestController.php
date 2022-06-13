<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AceRequest;
use Validator;

class AceRequestController extends Controller
{
     //
     public function index(){
        $data = AceRequest::with([
            'submitted_requests',
            'created_by_user',
            'updated_by_user',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = AceRequest::with([
            'submitted_requests',
            'created_by_user',
            'updated_by_user',
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = AceRequest::with([
            'submitted_requests',
            'created_by_user',
            'updated_by_user',
         ])->find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'ace_total_units_on_regi' => ['integer'],
            'ace_type' => ['required','string', 'max:255'],
            'submitted_request_id' => ['required','string'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  AceRequest::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = AceRequest::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = AceRequest::findOrFail($id);
        
        $data->update([
            'status' => '2'
        ]);
        
        $data->delete();
        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    public function find_by_user($id){
        $data = AceRequest::with([
            'submitted_requests',
            'created_by_user',
            'updated_by_user',
         ])->where('user_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function find_by_request($id){
        $data = AceRequest::with([
            'submitted_requests',
            'created_by_user',
            'updated_by_user',
         ])->where('submitted_request_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
}
