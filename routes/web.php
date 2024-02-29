<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function(){
    return view('adminPage');
})->middleware(['auth', 'admin']);

Route::get('/user', function(){
    return view('userPage');
});


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    Route::get('/courses', [App\Http\Controllers\Admin\CourseController::class, 'index']);
    Route::get('/course/create', [App\Http\Controllers\Admin\CourseController::class, 'create']);
    Route::post('/course/create', [App\Http\Controllers\Admin\CourseController::class, 'store']);
    Route::get('/course/edit/{id}', [App\Http\Controllers\Admin\CourseController::class, 'edit']);
    Route::post('/course/update/{id}', [App\Http\Controllers\Admin\CourseController::class, 'update']);
    Route::get('/course/delete/{id}', [App\Http\Controllers\Admin\CourseController::class, 'destroy']);

    Route::get('/trash', [App\Http\Controllers\Admin\CategoryController::class, 'trash']);
    Route::get('/trash/restore/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'restore']);
    Route::get('/trash/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

    Route::get('/featured/categories', [App\Http\Controllers\Admin\FeaturedController::class, 'view_featured_categories']);
    Route::post('/featured/categories/store', [App\Http\Controllers\Admin\FeaturedController::class, 'store_featured_category']);
    Route::get('/featured/courses', [App\Http\Controllers\Admin\FeaturedController::class, 'view_featured_courses']);
    Route::get('/featured/categories/delete/{id}', [App\Http\Controllers\Admin\FeaturedController::class, 'remove_featured_category']);
});