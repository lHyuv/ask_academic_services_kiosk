<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaggedSubject;
use Validator;

class TaggedSubjectController extends Controller
{
     //
     public function index(){
        $data = TaggedSubject::with([
            'tagged_by_user',
            'acad_heads',
            'acknowledgments',
            'ace_requests',
            'created_by_user',
            'updated_by_user',
     
         ])->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show_active(){
        $data = TaggedSubject::with([
            'tagged_by_user',
            'acad_heads',
            'acknowledgments',
            'ace_requests',
            'created_by_user',
            'updated_by_user',
      
         ])->where('status','1')->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id){
        $data = TaggedSubject::with([
            'tagged_by_user',
            'acad_heads',
            'acknowledgments',
            'ace_requests',
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
            'ace_request_id' => ['required','string'],
            'subject_id' => ['required','string'],
            'day' => ['required','string', 'max:255'],
            'time' => ['required'],
            'room_id' => ['required','string'],
            'no_of_units' => ['integer'],
            'acad_head' => ['string'],
            'tagged_by' => ['string'],
            'acknowledged_id' => ['string'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }

        $data =  TaggedSubject::create($request->all());
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }

    public function update(Request $request, $id){
        $data = TaggedSubject::findOrFail($id);
        $data->update($request->all());

        return [
            'message' => 'Successfully updated',
            'data' => $data
        ];  
    }

    public function delete(Request $request, $id){
        $data = TaggedSubject::findOrFail($id);
        
        $data->update([
            'status' => '2'
        ]);
        
        $data->delete();
        //return $data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

    public function find_by_ace_request($id){
        $data = TaggedSubject::with([
            'tagged_by_user',
            'acad_heads',
            'acknowledgments',
            'ace_requests',
            'created_by_user',
            'updated_by_user',
  
         ])->where('ace_request_id', $id)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

}
