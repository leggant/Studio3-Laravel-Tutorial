<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index'])->name('homepage');
Route::get('/about', [PagesController::class, 'about']);

Route::group(['prefix' => 'todos'], function() {

});
// Route::post('/', 'App\Http\Controllers\ToDoController@store');

// Route::resource('todo', 'ToDoController');