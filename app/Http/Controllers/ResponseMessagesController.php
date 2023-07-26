<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseMessagesController extends Controller
{
    const LOGIN_SUCCESS = 200;
    const LOGIN_SUCCESS_MESSAGE = 'Login successful';
    const LOGIN_FAILED = 'Login failed, password or login is invalid';
}
