<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ConversationDataController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('/auth/invite-link/{id}',  function ($id) {
    return view('auth.register',compact('id'));
});

Route::resource('directory', DirectoryController::class);
Route::resource('conversation', ConversationController::class);
Route::resource('conversation_data', ConversationDataController::class);
Route::resource('document', DocumentController::class);
Route::post('/store/document', [DocumentController::class, 'storeDocument']);
Route::resource('setting/users', UserController::class);  