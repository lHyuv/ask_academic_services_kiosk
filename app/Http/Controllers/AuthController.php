<?php
namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Models\User;
use App\Models\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);

         UserRole::create([
            'user_id' => $user->id,
            'role_id' => request('role_id'),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

  
    public function logout(Request $request)
    {
        if($request->user){
            $request->user()->tokens()->delete();
        }


        return [
            'message' => 'Success'
        ];
    }

    public function test(Request $request){

        return [
            'message' => 'Success'
        ];

    }
}