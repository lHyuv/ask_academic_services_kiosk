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
        $data = SubmittedRequirement::where('status','1')::with([
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

    public function show($id){
        $data = SubmittedRequirement::find($id)::with([
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

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'requirement_id'  => ['required', 'string'] ,
            'submitted_by'  => ['required', 'string'] ,
           // 'file_name'  => ['required', 'string'],
           // 'file_path'  => ['required', 'string'],
           'file'  => 'required|mimes:png,jpg,jpeg,gif,pdf,txt,docx,csv|max:2305',

        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
            $file->move(public_path('files'),$name); 

            $data = SubmittedRequirement::create([
                'requirement_id' => request('requirement_id'),
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
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
            $file->move(public_path('files'),$name); 

            $data->update([
                'requirement_id' => request('requirement_id'),
                'submitted_by' => request('submitted_by'),
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
        $data = SubmittedRequirement::where('submitted_by', $id)->orWhere('created_by', $id)::with([
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

    public function find_by_request($id){
        $data = SubmittedRequirement::where('submitted_request_id', $id)::with([
            'submitted_requests',
            'approved_by_user',
            'submitted_by_user',
            'requirements',
            'created_by_user',
            'updated_by_user',
         ])->get();;

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
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();
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
