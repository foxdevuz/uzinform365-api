<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#post methods
Route::post('/login', [UserController::class, 'login']);
Route::put('/addNews', [NewsController::class, 'addNews']);
Route::post('/updateNews', [NewsController::class, 'updateNews']);
Route::post('/deleteNews', [NewsController::class, 'deleteNews']);
Route::post('/addCategory', [CategoryController::class, 'addCategory']);
Route::post('/delCategory', [CategoryController::class, 'deleteCategory']);
Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
#get mesthods
Route::get('/getNews', [NewsController::class, 'getNews']);
Route::get('/getNews/{news:slug}', [NewsController::class, 'getOneNews']);
Route::get('/getAllCategories', [CategoryController::class, 'getAllCategories']);
Route::get('/getCategoryNews', [CategoryController::class, 'getCategoryNews']);
#test method
Route::get('/test', [UserController::class, 'test']);
