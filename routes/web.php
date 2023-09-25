<?php

use App\Http\Controllers\GroupsController;
use App\Http\Controllers\GroupTasksController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [RegisterUserController::class, 'index'])->name('register');
Route::get('/login', [LoginUserController::class, 'index'])->name('login');

Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');


    Route::get('/', [TasksController::class, 'index'])->name('tasks');
    Route::get('/groups', [GroupsController::class, 'index'])->name('groups');
    Route::get('/groups/{group}/tasks', [GroupTasksController::class, 'index'])->name('groups.task');
});


