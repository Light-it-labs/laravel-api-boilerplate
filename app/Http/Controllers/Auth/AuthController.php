<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetRequest;
use App\User;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);

        if($validator->fails() === true){
            return response()->json([
                'success' => false,
                'message' => 'Please check validation errors',
                'errors' => $validator->errors()
            ]);
        }

        if(($user = User::where('email', $request->email)->first()) !== null){
            $token = str_random(40);

            DB::table('password_resets')
              ->insert([
                  'email' => $request->email,
                  'token' => $token
              ]);

            Mail::to($request->email)->send(new PasswordResetRequest(['token' => $token]));

            return response()->json([
                'success' => true,
                'message' => 'Please check your email and follow the steps for reset your password',
                'data' => []
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Theres no existing user with that email',
            'data' => []
        ]);
    }

    public function resetPassword(Request $request, string $token): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails() === true){
            return response()->json([
                'success' => false,
                'message' => 'Please check validation errors',
                'errors' => $validator->errors()
            ]);
        }

        if(($tokenData = DB::table('password_resets')->where('token', $token)->first()) === null){
            return response()->json([
                'success' => false,
                'message' => 'Invalid token',
            ]);
        }

        $user = User::where('email', $tokenData->email)->first();
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        DB::table('password_resets')
          ->where('email', $tokenData->email)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully',
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
