<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index'])->name('pages.home');
Route::get('/about', [PagesController::class, 'about'])->name('pages.about');

Route::group(['prefix' => 'user/todos'], function() {
    Route::get('/create', [ToDoController::class, 'create'])->name('todos.create');
    Route::get('/all', [ToDoController::class, 'index'])->name('todos.index');
    Route::get('/{id}', [ToDoController::class, 'show']);
    Route::put('/{id}', [ToDoController::class, 'update'])->name('todos.update');
    Route::delete('/{id}', [ToDoController::class, 'destroy']);
    Route::post('/', [ToDoController::class, 'store'])->name('todos.store');
});