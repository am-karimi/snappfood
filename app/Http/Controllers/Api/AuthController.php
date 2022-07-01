<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

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
        return ['token' => $token];
//        return ['token' => $token];

    }
}
