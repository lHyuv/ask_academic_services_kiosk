<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acknowledgment;
use Validator;

class AcknowledgmentController extends Controller
{
     //
     public function index(){
        $data = Acknowledgment::with([
            'users',
            'receipts',
            'created_by_user',
            'updated_by_user',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = Acknowledgment::with([
            'users',
            'receipts',
            'created_by_user',
            'updated_by_user',
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = Acknowledgment::with([
            'users',
            'receipts',
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
            'user_id' => ['required','string'],
            'receipt_id' => ['required','string'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  Acknowledgment::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = Acknowledgment::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = Acknowledgment::findOrFail($id);
        
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
        $data = Acknowledgment::with([
            'users',
            'receipts',
            'created_by_user',
            'updated_by_user',
         ])->where('user_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function find_by_receipts($id){
        $data = Acknowledgment::with([
            'users',
            'receipts',
            'created_by_user',
            'updated_by_user',
         ])->where('receipt_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
}
