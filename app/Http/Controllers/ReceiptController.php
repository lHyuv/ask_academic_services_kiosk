<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use Validator;

class ReceiptController extends Controller
{
       //
    public function index(){
        $data = Receipt::with([
            'submitted_requests',
            'certified_by_user',
            'created_by_user',
            'updated_by_user',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = Receipt::with([
            'submitted_requests',
            'certified_by_user',
            'created_by_user',
            'updated_by_user',
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = Receipt::with([
            'submitted_requests',
            'certified_by_user',
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
            'submitted_request_id' => ['required', 'string'],
            'receipt_no' => ['required', 'string'],
            'fee'=> ['required'],
            'item'=> ['required', 'string'],

        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  Receipt::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = Receipt::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = Receipt::findOrFail($id);

        $data->update([
            'status' => '2'
        ]);

        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    //

    public function sign(Request $request, $id){
        $data = Receipt::findOrFail($id);

        $data->update([
            'signed_status' => 'Signed'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function set_paid(Request $request, $id){
        $data = Receipt::findOrFail($id);

        $data->update([
            'paid_status' => 'Paid'
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }



    public function certify(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'certified_by'=> ['required', 'string'],

        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }
        
        $data = Receipt::findOrFail($id);

        $data->update([
            'certified_by' => request('certified_by'),
        ]);

        //return $data;
        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];
    }

    public function find_by_request($id){
        $data = Receipt::with([
            'submitted_requests',
            'certified_by_user',
            'created_by_user',
            'updated_by_user',
         ])->where('submitted_request_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
}
