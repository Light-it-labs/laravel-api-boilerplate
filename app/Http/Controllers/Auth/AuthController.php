<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required'
        ]);

        if($validator->fails() === true){
            return response()->json([
               'success' => false,
               'message' => 'Please check validation errors',
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
            'message' => 'User registered successfully',
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ]);
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails() === true){
            return response()->json([
                'success' => false,
                'message' => 'Please check validation errors',
                'errors' => $validator->errors()
            ]);
        }

        if(!$token = auth()->attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'success' => false,
                'message' => 'Please check validation errors',
                'errors' => [
                    'email' => ['There is something wrong! We could not verify details']
                ]]);
        }

        return response()->json([
           'success' => true,
           'message' => 'User logged successfully',
           'data' => [
               'user' => $request->user(),
               'token' => $token,
           ]
        ]);
    }

    public function logout()
    {
        auth()->logout();
    }

    public function reset(Request $request): JsonResponse
    {

        return response()->json([
            'success' => true,
            'message' => 'Please check your email and follow the steps for reset your password',
            'data' => []
        ]);
    }

    public function user(Request $request): JsonResponse
    {
        if(($user = $request->user()) !== null)
            return response()->json([
                'success' => true,
                'message' => 'User data',
                'data' => [
                    'user' => $user,
                ]
            ]);

        return response()->json([
           'success' => false,
        ]);
    }
}
