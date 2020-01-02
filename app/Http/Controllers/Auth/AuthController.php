<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required'
        ]);

        if($validator->fails() === true){
            return response()->json([
               'success' => false,
               'errors' => $validator->errors()
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = auth()->attempt($request->only(['email', 'password']));

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails() === true){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        if(!$token = auth()->attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'success' => false,
                'errors' => [
                    'email' => ['There is something wrong! We could not verify details']
                ]]);
        }

        return response()->json([
           'success' => true,
           'data' => [
               'user' => $request->user(),
               'token' => $token,
           ]
        ]);
    }

    public function user(Request $request)
    {
        if(($user = $request->user()) !== null)
        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
            ]
        ]);
    }
}
