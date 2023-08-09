<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Middleware\TokenVerificationMiddleware;

// auth route
Route::post('/user-registration',[UserController::class,'userRegistration']);
Route::post('/UserLogin',[UserController::class,'userLogin']);
Route::post('/sendOtpToEmail',[UserController::class,'sendOtpToEmail']);
Route::post('/otpVerify',[UserController::class,'otpVerify']);
Route::post('/setPassword',[UserController::class,'setPassword'])->middleware([TokenVerificationMiddleware::class]);

// profile route details
Route::get('/user-profile-details',[UserController::class,'getUser'])->middleware([TokenVerificationMiddleware::class]);
//profile update
Route::post('/profile-update',[UserController::class,'profileUpdate'])->middleware([TokenVerificationMiddleware::class]);

// pages
Route::get('/registration',[UserController::class,'registration']);
Route::get('/login',[UserController::class,'login']);
Route::get('/sendOtp',[UserController::class,'sendOtp']);
Route::get('/verifyOtp',[UserController::class,'verifyOtp']);
Route::get('/resetPassword',[UserController::class,'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
// after authtication 
Route::get('/dashboard',[UserController::class,'dashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/profile',[UserController::class,'profile'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/logout',[UserController::class,'userLogOut']);




// income route

Route::get('income-list',[IncomeController::class,'getIncome'])->middleware([TokenVerificationMiddleware::class]);
Route::post('income-create',[IncomeController::class,'incomeCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('income-update',[IncomeController::class,'incomeUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('income-delete',[IncomeController::class,'incomeDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::get('total-income',[IncomeController::class,'totalIncome'])->middleware([TokenVerificationMiddleware::class]);
Route::get('net-income',[IncomeController::class,'netIncome'])->middleware([TokenVerificationMiddleware::class]);
Route::post('income-by-id',[IncomeController::class,'IncomeById'])->middleware([TokenVerificationMiddleware::class]);

// page

Route::get('income',[IncomeController::class,'income'])->middleware([TokenVerificationMiddleware::class]);





//expense route 

Route::get('expense-list',[ExpenseController::class,'getExpense'])->middleware([TokenVerificationMiddleware::class]);
Route::post('expense-create',[ExpenseController::class,'expenseCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('expense-update',[ExpenseController::class,'expenseUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post('expense-delete',[ExpenseController::class,'expenseDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::get('total-expense',[ExpenseController::class,'totalExpense'])->middleware([TokenVerificationMiddleware::class]);
Route::post('expense-by-id',[ExpenseController::class,'ExpenseById'])->middleware([TokenVerificationMiddleware::class]);

// page

Route::get('expense',[ExpenseController::class,'expense'])->middleware([TokenVerificationMiddleware::class]);









