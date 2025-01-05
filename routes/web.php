<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ---- Post Routes ----

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post}/show', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');


// ---- Category Routes ----

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');

// ---- Permission Routes ----
Route::resource('permissions', PermissionController::class);

// ---- Role Routes ----
Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/assign-permission', [RoleController::class, 'assignPermissionToRole'])->name('roles.assignPermission');
Route::put('roles/{roleId}/assign-permission', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermission');
