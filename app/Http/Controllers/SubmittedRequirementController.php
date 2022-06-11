<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedRequirement;
use Validator;

class SubmittedRequirementController extends Controller
{
       //
       public function index(){
        $data = SubmittedRequirement::with([
            'submitted_requests',
            'approved_by_user',
            'submitted_by_user',
            'requirements',
            'created_by_user',
            'updated_by_user',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = SubmittedRequirement::with([
            'submitted_requests',
            'approved_by_user',
            'submitted_by_user',
            'requirements',
            'created_by_user',
            'updated_by_user',
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = SubmittedRequirement::with([
            'submitted_requests',
            'approved_by_user',
            'submitted_by_user',
            'requirements',
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
            'requirement_id'  => ['required', 'string'] ,
            'submitted_by'  => ['required', 'string'] ,
            'submitted_request_id'  => ['required', 'string'] ,
           // 'file_name'  => ['required', 'string'],
           // 'file_path'  => ['required', 'string'],
           'file'  => 'required|mimes:png,jpg,jpeg,gif,pdf,txt,docx,csv|max:2305',

        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        if ($file = $request->file('file')) {

            $name = $file->getClientOriginalName();
            $path = 'public/files/' . $name;
            $file->move(public_path('files'),$name); 

            $data = SubmittedRequirement::create([
                'requirement_id' => request('requirement_id'),
                'submitted_request_id' => request('submitted_request_id'),
                'submitted_by' => request('submitted_by'),
                'file_name' => $name,
                'file_path' => $path,
            ]);

            return [
                'message' => 'Successfully created',
                'data' => $data,
                'file' => [
                    'file_name' => $name,
                    'file_path' => $path,
                    ]
            ];
        }



    }

    public function update(Request $request, $id){
        $data = SubmittedRequirement::findOrFail($id);

        if ($file = $request->file('file')) {
           
            $name = $file->getClientOriginalName();
            $path = 'public/files/' . $name;
            $file->move(public_path('files'),$name); 

            $data->update([
                'requirement_id' => request('requirement_id'),
                'submitted_by' => request('submitted_by'),
                'submitted_request_id' => request('submitted_request_id'),
                'file_name' => $name,
                'file_path' => $path,
            ]);

            return [
                'message' => 'Successfully updated',
                'data' => $data,
                'file' => [
                    'file_name' => $name,
                    'file_path' => $path,
                    ]
            ];
        }


    }

    public function delete(Request $request, $id){
        $data = SubmittedRequirement::findOrFail($id);

        $data->update([
            'status' => '2'
        ]);

        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    public function find_by_user($id){
        $data = SubmittedRequirement::with([
            'submitted_requests',
            'approved_by_user',
            'submitted_by_user',
            'requirements',
            'created_by_user',
            'updated_by_user',
         ])->where('submitted_by', $id)->orWhere('created_by', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function find_by_request($id){
        $data = SubmittedRequirement::with([
            'submitted_requests',
            'approved_by_user',
            'submitted_by_user',
            'requirements',
            'created_by_user',
            'updated_by_user',
         ])->where('submitted_request_id', $id)->get();;

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
    //

    public function sign(Request $request, $id){
        $data = SubmittedRequirement::findOrFail($id);

        $data->update([
            'signed_status' => 'Signed'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }


    public function approve_requirement(Request $request, $id){
        $data = SubmittedRequirement::findOrFail($id);

        $data->update([
            'requirement_status' => 'Approved'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }



    public function reject_requirement(Request $request, $id){


        $validator = Validator::make($request->all(), [
            'rejection_reason'  => ['required', 'string'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }


        $data = SubmittedRequirement::findOrFail($id);

        $data->update([
            'requirement_status' => 'Rejected',
            'rejection_reason' => request('rejection_reason'),
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function change_requirement(Request $request, $id){

        $validator = Validator::make($request->all(), [
          //  'file_name'  => ['required', 'string'],
           // 'file_path'  => ['required', 'string'],
           'file'  => 'required|mimes:png,jpg,jpeg,gif,pdf,txt,docx,csv|max:2305',

        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }


        $data = SubmittedRequirement::findOrFail($id);

        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $path = 'public/files/' . $name;
            $file->move(public_path('files'),$name); 

            $data->update([

                'file_name' => $name,
                'file_path' => $path,
            ]);

            return [
                'message' => 'Successfully updated',
                'data' => $data,
                'file' => [
                    'file_name' => $name,
                    'file_path' => $path,
                    ]
            ];
        }


    }
}
