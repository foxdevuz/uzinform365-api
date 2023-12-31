<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResponseMessagesController extends Controller
{
    protected function generateSlug($title){
        $slug = Str::lower($title);
        $slug = Str::replace(' ', '-', $slug);
        $slug = Str::ascii($slug);
        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);

        return $slug;
    }


    const SUCCESS_CODE = 200;
    const SERVER_ERROR = 200;
    const LOGIN_SUCCESS_MESSAGE = 'Login successful';
    const LOGIN_FAILED = 'Login failed, password or login is invalid';
    const NEWS_SUCCESS = 'News has been added successfully';
    const NEWS_SUCCESS_UPD = 'News has been updated successfully';
    const NEWS_SUCCESS_DEL = 'News has been deleted successfully';
    const ERROR_MESSAGE = "An error has occurred";
    const NEWS_NOT_FOUND = 'News not found';
}
