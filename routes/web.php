<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Auth\LoginController;

//resource is for default create CRUD methods
//The URL starts with items and depends on what controller called.


Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function (){

    Route::resource('items', ItemController::class);
});



Route::get('/', function () {
    return view('welcome');
});
