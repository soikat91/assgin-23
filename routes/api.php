<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// auth route
Route::post('/user-registration',[UserController::class,'userRegistration']);
Route::post('/UserLogin',[UserController::class,'userLogin']);
Route::post('/sendOtpToEmail',[UserController::class,'sendOtpToEmail']);
Route::post('/otpVerify',[UserController::class,'otpVerify']);
Route::post('/setPassword',[UserController::class,'setPassword'])->middleware([TokenVerificationMiddleware::class]);




// todo-list route
Route::get('/getTodoList',[TodoController::class,'getTodoList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-todoList',[TodoController::class,'createList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-todoList',[TodoController::class,'updateList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-todoList',[TodoController::class,'deleteList'])->middleware([TokenVerificationMiddleware::class]);
