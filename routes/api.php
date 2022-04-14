<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// user
Route::post('/user/sign-in', [LoginController::class, 'signIn']);
Route::post('/user/sign-up', [RegisterController::class, 'createUser']);
Route::get('/user/sign-out', [LoginController::class, 'logout']);
Route::put('/user/update', [UserController::class, 'edit']);
Route::delete('/user/delete', [UserController::class, 'destroy']);

// Journal
Route::post('/journal', [JournalController::class, 'create']);
Route::put('/journal/{journal_id}', [JournalController::class, 'edit']);
Route::delete('/journal/{journal_id}', [JournalController::class, 'destroy']);

// Diary
Route::post('/diary', [DiaryController::class, 'create']);
Route::put('/diary/{diary_id}', [DiaryController::class, 'edit']);
Route::delete('/diary/{diary_id}', [DiaryController::class, 'destroy']);
