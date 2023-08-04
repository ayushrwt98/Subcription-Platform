<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/create-web',[WebController::class,'create']);
Route::post('/subscribe',[SubsController::class,'subscribe']);
Route::post('/create-post',[PostController::class,'create']);
Route::get('/send-email-to-subscribers',[SubsController::class,'sendEmailToSubscribers']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
