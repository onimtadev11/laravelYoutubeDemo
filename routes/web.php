<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::post('/register',[UserController::class,'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login ',[UserController::class,'login']);

//blog post trlated routes
Route::post('/create-post',[PostController::class,'createPost']);