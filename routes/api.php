<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#post methods
Route::post('/login', [UserController::class, 'login']);
Route::post('/addNews', [NewsController::class, 'addNews']);
Route::post('/updateNews', [NewsController::class, 'updateNews']);
Route::post('/deleteNews', [NewsController::class, 'deleteNews']);
Route::post('/addCategory', [CategoryController::class, 'addCategory']);
Route::post('/delCategory', [CategoryController::class, 'deleteCategory']);
Route::post('/updateCategory', [CategoryController::class, 'updateCategory']);
#get mesthods
Route::any('/getNews', [NewsController::class, 'getNews']);
Route::any('/getNews/{news:slug}', [NewsController::class, 'getOneNews']);
Route::any('/getAllCategories', [CategoryController::class, 'getAllCategories']);
Route::any('/getCategoryNews', [CategoryController::class, 'getCategoryNews']);
