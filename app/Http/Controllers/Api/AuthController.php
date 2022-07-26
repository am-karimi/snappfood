<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['User Name or Password InCorrect.'],
            ]);
        }
        $token=$user->createToken('userToken')->plainTextToken;
        return [
            'token' => $token,
            'message'=>'Login Successfull'
        ];
    }


    public function register(Request $request)
    {
        $validate=$request->validate([
           'name'=>'required|string',
           'phone'=>'required|string',
           'email'=>'required|email',
           'password'=>'required|confirmed',
        ]);

        $user=User::create([
           'name'=>$request->name,
           'phone'=>$request->phone,
           'email'=>$request->email,
           'password'=>bcrypt($request->password),
        ]);

        $token=$user->createToken('userToken')->plainTextToken;
        return [
            'token' => $token,
            'message'=>'Register Successfully'
        ];
    }


    public function logout(Request $request)
    {
        $request->user()->tokens('user_token')->delete();

        return response()->json([
            'message' => 'LogOut successfully',
        ]);
    }
}
