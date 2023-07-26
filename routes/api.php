<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [UserController::class, 'login']);
Route::post('/addNews', [NewsController::class, 'addNews']);
Route::post('/updateNews', [NewsController::class, 'updateNews']);
Route::post('/deleteNews', [NewsController::class, 'deleteNews']);
