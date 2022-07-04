<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Requests;
use Validator;
use Carbon\Carbon;

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


        if ($file = $request->file('file')) {

                    
            $validator = Validator::make($request->all(), [
                'request_type' => ['required', 'string', 'max:255','unique:requests'],
                'file'  => 'required|mimes:png,jpg,jpeg|max:2305',
            ]);

            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $path = 'files/';
            $name = Carbon::now()->format('Y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('files'),$name); 

           // $data =  Requests::create($request->all());
           $data =  Requests::create([
            'request_type' => request('request_type'),
            'icon_file_name' => $name,
            'icon_file_path' => $path,
            'created_by' => request('created_by'),
           ]);
            return [
                'message' => 'Successfully created',
                'data' => $data
            ];
        }else{
            $validator = Validator::make($request->all(), [
                'request_type' => ['required', 'string', 'max:255','unique:requests'],
     
            ]);

            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $data =  Requests::create($request->all());
        }
    }

    public function update(Request $request, $id){



        if ($file = $request->file('file')) {

            $validator = Validator::make($request->all(), [
                'request_type' => ['required', 'string', 'max:255'],
                'file'  => 'required|mimes:png,jpg,jpeg|max:2305',
            ]);
    
            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $path = 'files/';
            $name = Carbon::now()->format('Y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('files'),$name); 
            $request_data = Requests::findOrFail($id);
          //  $request_data->update($request->all());
            $request_data->update([
                'request_type' => request('request_type'),
                'icon_file_name' => $name,
                'icon_file_path' => $path,
                'updated_by' => request('updated_by'),
            ]);
            
            return [
                'message' => 'Successfully updated',
                'data' => $request_data
            ];  
        }else{
            
            $validator = Validator::make($request->all(), [
                'request_type' => ['required', 'string', 'max:255'],
              
            ]);
    
            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $request_data = Requests::findOrFail($id);
            $request_data->update($request->all());
        }
    }

    public function delete(Request $request, $id){
        $request_data = Requests::findOrFail($id);

        $request_data->update([
            'status' => '2'
        ]);
        $data->delete();
        //return $request_data;
        return [
            'message' => 'Successfully deleted'
        ];
    }

}
