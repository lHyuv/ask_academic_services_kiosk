<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Validator;

class ClientController extends Controller
{
    //
    public function index(){
        $data = Client::with([
            'users',
            'created_by_user',
            'updated_by_user',
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = Client::with([
            'users',
            'created_by_user',
            'updated_by_user',
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = Client::with([
            'users',
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
            //
            'last_name' => ['required','string', 'max:255'],
            'first_name' => ['required','string', 'max:255'],
            'user_id' => ['string'],
            'year_level' => ['string'],
            'student_number' => ['string'],
            'program' =>['string'],
            'contact_number' =>['string'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  Client::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = Client::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = Client::findOrFail($id);

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
        $data = Client::with([
            'users',
            'created_by_user',
            'updated_by_user',
         ])->where('user_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function find_by_student_number($id){
        $data = Client::with([
            'users',
            'created_by_user',
            'updated_by_user',
         ])->where('student_number', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
}
