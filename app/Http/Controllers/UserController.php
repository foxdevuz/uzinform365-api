<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => self::LOGIN_SUCCESS_MESSAGE], self::LOGIN_SUCCESS);
        }

        return response()->json(['message' => self::LOGIN_SUCCESS_MESSAGE], 401);
    }
}
