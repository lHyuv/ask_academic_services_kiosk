<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index()
    {
       // $data = User::all();
       $data = User::with([
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
        $data = User::with([
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
        $data = User::with([
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
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }
        //
        $data = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
      
        ]);

        return [
            'message' => 'Successfully created',
            'data' => $data
        ];

    }

    public function update(Request $request, $id)
    {
        //request()->validate([...=>...]); //Enter validation here
        $user = User::findOrFail($id);
       // $user->update($request->all());
        $user->update([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        return [
            'message' => 'Successfully updated',
            'data' => $user
        ];
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => '2']);
        $data->delete();
        //return $user;
        return [
            'message' => 'Successfully deleted'
        ];
    }
}
