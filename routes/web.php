<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

//resource is for default create CRUD methods
//The URL starts with items and depends on what controller called.

Route::resource('items', ItemController::class);



Route::get('/', function () {
    return view('welcome');
});
