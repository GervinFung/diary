<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('sign-in', [LoginController::class, 'showLoginForm']);
Route::get('sign-up', [RegisterController::class, 'showRegisterForm']);
Route::get('sign-out', [LoginController::class, 'logout']);
Route::get('public-journals', [JournalController::class, 'index']);
Route::get('my-journals', [JournalController::class, 'showMyJournals']);
Route::get('journal/{journal_id}', [JournalController::class, 'showOne']);
Route::view('create-journal', 'createJournal');
Route::view('journal/create-diary', 'createDiary');
Route::get('diary/{diary_id}', [DiaryController::class, 'showOne']);
