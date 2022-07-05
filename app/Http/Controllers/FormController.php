<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Validator;
use Carbon\Carbon;
use App\Models\Request as Requests;

class FormController extends Controller
{
    public function index()
    {
        //$data = Form::all();
          $data = Form::with([
              'requests',
              'created_by_user',
              'updated_by_user'
           ])->get();
   

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
 
    public function show_active()
    {
        $data = Form::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->where('status','1')->get();
        
        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function show($id)
    {
        $data = Form::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->find($id);

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }

    public function create(Request $request)
    {
        if ($file = $request->file('file')) {

                    
            $validator = Validator::make($request->all(), [
                'form_name' =>['string','max:255'],
                'request_id' => ['required', 'string', 'max:255'],
                'file'  => 'required|mimes:png,jpg,jpeg|max:2305',
            ]);

            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $path = 'files/';
            $name = Carbon::now()->format('Y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('files'),$name); 

           // $data =  Requests::create($request->all());
           $data =  Form::create([
            'form_name' => request('form_name'),
            'source' => request('source'),
            'request_id' => request('request_id'),
            'form_file_name' => $name,
            'form_file_path' => $path,
            'created_by' => request('created_by'),
           ]);
            return [
                'message' => 'Successfully created',
                'data' => $data
            ];
        }else{
            $validator = Validator::make($request->all(), [
                'form_name' =>['string','max:255'],
                'request_id' => ['required', 'string', 'max:255'],
            ]);

            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $data =  Form::create($request->all());

            return [
                'message' => 'Successfully created',
                'data' => $data
            ];
        }
    }

    public function update(Request $request, $id)
    {
        if ($file = $request->file('file')) {

            $validator = Validator::make($request->all(), [
                'form_name' =>['string','max:255'],
                'request_id' => ['required', 'string', 'max:255'],
                'file'  => 'required|mimes:png,jpg,jpeg|max:2305',
            ]);
    
            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $path = 'files/';
            $name = Carbon::now()->format('Y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('files'),$name); 
            $data = Form::findOrFail($id);
          //  $request_data->update($request->all());
            $data->update([
                'form_name' => request('form_name'),
                'source' => request('source'),
                'request_id' => request('request_id'),
                'form_file_name' => $name,
                'form_file_path' => $path,
                'created_by' => request('created_by'),
            ]);
            
            return [
                'message' => 'Successfully updated',
                'data' => $data
            ];  
        }else{
            
            $validator = Validator::make($request->all(), [
                'form_name' =>['string','max:255'],
                'request_id' => ['required', 'string', 'max:255'],
              
            ]);
    
            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }

            $data = Form::findOrFail($id);
            $data->update($request->all());

            return [
                'message' => 'Successfully updated',
                'data' => $data
            ];  
        }
    }

    public function delete(Request $request, $id)
    {
        $Form = Form::findOrFail($id);
        $Form->update(['status' => '2']);
        $Form->delete();
        //return $Form;
        return [
            'message' => 'Successfully deleted'
        ];

    }

    public function find_by_request($request){
        $data = Form::with([
            'requests',
            'created_by_user',
            'updated_by_user'
         ])->where('request_id', $request)->get();

        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }
}
