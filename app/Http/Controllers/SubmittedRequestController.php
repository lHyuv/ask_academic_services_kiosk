<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmittedRequest;
use Validator;
use Carbon\Carbon;

class SubmittedRequestController extends Controller
{
       //
    public function index(){
        $data = SubmittedRequest::with([
            'requests',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = SubmittedRequest::where('status','1')::with([
            'requests',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = SubmittedRequest::with([
            'requests',
         ])->find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'request_id' => ['required', 'string'],
            'student_number' => ['string'],
            'reference_number' => ['required', 'string'],

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
        $data->delete();
        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    public function find_by_user($id){
        $data = SubmittedRequest::with([
            'requests',
         ])->where('student_number', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function find_by_request($id){
        $data = SubmittedRequest::with([
            'requests',
         ])->where('request_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function date_query(Request $request){

        $validator = Validator::make($request->all(), [
            'date_from' => ['required'],
            'date_to' => ['required'],

        ]);

        $data = SubmittedRequest::with([
            'requests',
         ])
         //->whereDate('created_at','>=', request('date_from')->format('Y-m-d'))
         //->whereDate('created_at','<=', request('date_to')->format('Y-m-d'))
         ->whereDate('created_at','>=', request('date_from'))
         ->whereDate('created_at','<=', request('date_to'))
         ->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
    
    public function month(Request $request){


        $validator = Validator::make($request->all(), [
            'month' => ['required'],

        ]);

        $data = SubmittedRequest::with([
            'requests',
         ])
         ->whereMonth('created_at','=', 
          request('month'))
         ->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function day(Request $request){

        $validator = Validator::make($request->all(), [
            'date' => ['required'],

        ]);

        $data = SubmittedRequest::with([
            'requests',
         ])
         ->whereDate('created_at','=', Carbon::parse(request('date'))->format('Y-m-d'))
         ->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
}