<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Home Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $tasks = Task::whereDate('task_date', today())->get();

    return view('welcome', compact('tasks'));
});

/*
|--------------------------------------------------------------------------
| Task List
|--------------------------------------------------------------------------
*/

Route::get('/tasks', function () {
    $tasks = Task::orderBy('task_date')->get();

    return view('tasks', compact('tasks'));
});

/*
|--------------------------------------------------------------------------
| About Page
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('about');
});

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tasks/create', [TaskController::class, 'create']);
    Route::post('/tasks', [TaskController::class, 'store']);

    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);

    Route::post('/tasks/{id}/archive', [TaskController::class, 'archive']);

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::get('/customers/create', [CustomerController::class, 'create']);
Route::post('/customers/store', [CustomerController::class, 'store']);

Route::get('/customers/{id}/edit', [CustomerController::class, 'edit']);
Route::put('/customers/{id}', [CustomerController::class, 'update']);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/store', [UserController::class, 'store']);

Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);

require __DIR__.'/auth.php';