<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;
use Validator;

class StepController extends Controller
{
    //
    public function index(){
        // $data = Step::all();
        $data = Step::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = Step::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = Step::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function find_by_request($request){
        $data = Step::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->where('request_id', $request)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), [
            'request_id' => ['required', 'string'],
            'step_number' => ['required', 'integer'],
            'step_name' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  Step::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = Step::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = Step::findOrFail($id);

        $data->update([
            'status' => '2'
        ]);

        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    public function complete_step(Request $request, $id){
        $data = Step::findOrFail($id);

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
