<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect the homepage straight to the task list
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Full CRUD routes for tasks (index, create, store, edit, update, destroy)
Route::resource('tasks', TaskController::class);

// Extra route: quick toggle for Pending <-> Completed
Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
    ->name('tasks.updateStatus');
