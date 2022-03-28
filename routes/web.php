<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Auth::routes();

// LSW - START
// Route::get('/journals',[JournalController::class,'getJournals']);
// Route::get('/journal/{id}',[JournalController::class,'getJournal']);
// Route::get('/diary/{id}',[DiaryController::class,'getDiary']);
// LSW - END

/*
    WZR - START

    public-journals -> display list of all public journals
    my-journals -> display list of all journals owned by current user
    create-journal (view) -> display create new journal page
    create-journal (post) -> create new journal
    view-journal -> display journal details and list of all diaries in that journal (user can edit the journal title/year, 
                    when click save will direct to edit-journal to save, and redirect back to view-journal)
    edit-journal (post) -> save the edit
    delete-journal -> delete a journal
    create-diary (view) -> display create new journal page
    create-diary (post) -> create new journal

    **view-diary -> display diary content
    **edit-diary (view) -> display edit diary content page

    edit-diary (post) -> save the edit
    delete-diary -> delete a diary
*/
Route::get('/sign-in', [LoginController::class,'showLoginForm']);
Route::post('/sign-in', [LoginController::class,'signIn']);

Route::get('/sign-up', [RegisterController::class,'showRegisterForm']);
Route::post('/sign-up', [RegisterController::class,'createUser']);

Route::get('/sign-out', [LoginController::class,'logout']);

Route::get('/public-journals', [JournalController::class,'index']);
Route::get('/my-journals', [JournalController::class,'show']);

Route::view('/create-journal', 'createJournal');
Route::post('/create-journal', [JournalController::class,'create']);

Route::get('/journal/{journal_id}', [JournalController::class,'showOne']);
Route::post('/journal/{journal_id}/edit', [JournalController::class,'edit']);

Route::delete('/journal/{journal_id}/delete', [JournalController::class,'destroy']);

Route::view('journal/create-diary', 'createDiary');
Route::post('journal/create-diary', [DiaryController::class,'create']);

Route::get('/diary/{diary_id}', [DiaryController::class,'showOne']);
Route::post('/diary/{diary_id}/edit', [DiaryController::class,'edit']);

Route::delete('/diary/{diary_id}/delete', [DiaryController::class,'destroy']);
// WZR - END