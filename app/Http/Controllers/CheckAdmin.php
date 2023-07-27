<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CheckAdmin extends Controller
{
    public static function check($token){
        return User::where('token', $token)->first();
    }
}
