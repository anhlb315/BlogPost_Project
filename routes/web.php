<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomepageController::class, 'index']);

//Routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //For Categories
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);

    //For Posts
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/add-post', [PostController::class, 'create']);
    Route::post('/add-post', [PostController::class, 'store']);
    Route::get('/post/{post_id}', [PostController::class, 'edit']);
    Route::put('/update-post/{post_id}', [PostController::class, 'update']);
    Route::get('/delete-post/{post_id}', [PostController::class, 'destroy']);

    //For Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{user_id}', [UserController::class, 'edit']);
    Route::post('/update-user/{user_id}', [UserController::class, 'update']);
});

// This route for view post at homepage
Route::get('tutorial/{category_slug}', [HomepageController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}', [HomepageController::class, 'viewPost']);

// This route for authentication
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
