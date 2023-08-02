<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends ResponseMessagesController
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $login = request('login');
        $password = request('password');

        $login = User::where('login', $login)->first();
        if(!$login){
            return response()->json(['message' => "Login or password is wrong"], 400);
        }
        if(Hash::check($password, $login->password)){
            return response()->json(['message' => "Login or password is wrong"], 400);
        }
        return response()->json(['message' => self::LOGIN_SUCCESS_MESSAGE], 401);
    }

    public function test(){
        $ip = request()->ip();
        $userAgent = request()->userAgent();

        dd($ip, $userAgent,);
    }
}
