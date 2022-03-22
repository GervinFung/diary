<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\JournalController;
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

// LSW - START
Route::get('/journals',[JournalController::class,'getJournals']);
Route::get('/journal/{id}',[JournalController::class,'getJournal']);
Route::get('/diary/{id}',[DiaryController::class,'getDiary']);
// LSW - END