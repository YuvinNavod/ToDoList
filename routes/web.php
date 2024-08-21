<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', [HomeController::class, "index"])->name('home');

//Todo
Route :: prefix('/todo')->group(function(){
    Route::get('/', [TodoController::class, "index"])->name('todo');
    Route::post('/store', [TodoController::class, "store"])->name('todo.store');
    Route::get('/{task_id}/delete', [TodoController::class, "delete"])->name('todo.delete');
    Route::get('/{task_id}/done', [TodoController::class, "done"])->name('todo.done');
    Route::get('/edit', [TodoController::class, "edit"])->name('todo.edit');
    Route::post('/{task_id}/update', [TodoController::class, "update"])->name('todo.update');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
