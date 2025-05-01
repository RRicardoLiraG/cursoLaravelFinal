<?php

use App\Http\Controllers\BranchesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('modules.users.login');
});

Route::get('/content', function () {
    return view('modules.content');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/first-user', [UsersController::class, 'firstUser']);
Route::get('/content/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/content/branches', [BranchesController::class, 'index'])->name('branches.index');
Route::get('/content/products', [ProductsController::class, 'index'])->name('products.index');

Route::post('content/users', [UsersController::class, 'store'])->name('users.store');
Route::put('/content/users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
Route::put('/content/users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');
Route::put('/content/users/{id}/update', [UsersController::class, 'update'])->name('users.update');


