<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use Validator;

class UserRoleController extends Controller
{
    public function index()
    {
        $data = UserRole::with([
            'user',
            'role',
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
        $data = UserRole::with([
            'user',
            'role',
            'created_by_user',
            'updated_by_user'
         ])->where('status','1')->get();
        
        return [
            'message' => 'Successfully retrieved',
            'data' => $data
        ];
    }


    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'string'],
            'role_id' => ['required', 'string'],
        ]);

        if($validator->fails()){
            return ['message' => [$validator->errors()]];       
        }
        //
        //request()->validate([...=>...]); //Enter validation here
        $data = UserRole::create($request->all());
        
        return [
            'message' => 'Successfully created',
            'data' => $data
        ];
    }


}
