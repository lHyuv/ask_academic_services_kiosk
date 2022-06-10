<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedRequest;
use Validator;

class SubmittedRequestController extends Controller
{
       //
    public function index(){
        $data = SubmittedRequest::with([
            'requests',
            'created_by_user',
            'updated_by_user',
            'received_by' ,
            'approved_by',
            'client',
            'forward_to',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = SubmittedRequest::where('status','1')::with([
            'requests',
            'created_by_user',
            'updated_by_user',
            'received_by' ,
            'approved_by',
            'client',
            'forward_to',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = SubmittedRequest::find($id)::with([
            'requests',
            'created_by_user',
            'updated_by_user',
            'received_by' ,
            'approved_by',
            'client',
            'forward_to',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'request_id' => ['required', 'string'],
            'request_deadline' => ['required', 'date'],
            'school_year' => ['required'],

        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  SubmittedRequest::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'status' => '2'
        ]);

        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    public function find_by_user($id){
        $data = SubmittedRequest::where('client', $id)->orWhere('created_by', $id)::with([
            'requests',
            'created_by_user',
            'updated_by_user',
            'received_by' ,
            'approved_by',
            'client',
            'forward_to',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    //

    public function sign(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'signed_status' => 'Signed'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function student_sign(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'signed_student_status' => 'Signed'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }


    public function approve_request(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'request_status' => 'Approved'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function approve_release(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'release_status' => 'Approved'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function approve_application(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'application_status' => 'Approved'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }


    public function reject_request(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'request_status' => 'Rejected'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function reject_release(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'release_status' => 'Rejected'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function reject_application(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'application_status' => 'Rejected'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function complete(Request $request, $id){
        $data = SubmittedRequest::findOrFail($id);

        $data->update([
            'completed_status' => 'Completed'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

}
