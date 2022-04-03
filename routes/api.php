<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\JournalController;

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

// Auth
Route::post('/sign-in', [LoginController::class, 'signIn']);
Route::post('/sign-up', [RegisterController::class, 'createUser']);

// Journal
Route::put('/journal', [JournalController::class, 'create']);
Route::post('/journal/{journal_id}', [JournalController::class, 'edit']);
Route::delete('/journal/{journal_id}', [JournalController::class, 'destroy']);

// Diary
Route::put('/diary', [DiaryController::class, 'create']);
Route::post('/diary/{diary_id}', [DiaryController::class, 'edit']);
Route::delete('/diary/{diary_id}', [DiaryController::class, 'destroy']);
