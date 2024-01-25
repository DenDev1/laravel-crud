<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodolistController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [LoginController::class, 'index'])->name('login.index');

// Routes that don't require authentication
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/register', [RegisterController::class, 'create'])->name('contact.create');
Route::post('/register', [RegisterController::class, 'store'])->name('register');



// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/login/todolist', [TodoListController::class, 'index'])->name('login.todolist');
    Route::post('/save-task', [TodoListController::class, 'saveTask'])->name('save');
    Route::get('/delete-task/{id}', [TodolistController::class, 'deleteTask'])->name('deleteTask');
    Route::get('/update-task/{id}', [TodolistController::class, 'updateTask'])->name('updateTask');
    Route::post('/save-update-task', [TodolistController::class, 'saveUpdateTask'])->name('saveUpdateTask');
});


// Login and logout routes
Route::post('/login', [LoginController::class, 'todolist'])->name('todolist');



// Thanks route (not clear how this is intended to be used)
Route::get('/thanks', [RegisterController::class, 'thanks']);