<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
<<<<<<< HEAD
use App\Http\Controllers\Auth\LoginController;
=======
>>>>>>> f91585311a24ac6032a2a2b7f605b69bf2070fbb

//resource is for default create CRUD methods
//The URL starts with items and depends on what controller called.

Route::resource('items', ItemController::class);



Route::get('/', function () {
    return view('welcome');
});
