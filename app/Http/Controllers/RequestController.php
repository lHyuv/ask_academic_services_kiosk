<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Requests;
use Validator;

class RequestController extends Controller
{
    //
    public function index(){
        $data = Requests::with([
            'created_by_user',
            'updated_by_user'
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = Requests::with([
            'created_by_user',
            'updated_by_user'
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = Requests::with([
            'created_by_user',
            'updated_by_user'
         ])->find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'request_type' => ['required', 'string', 'max:255','unique:requests'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

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
