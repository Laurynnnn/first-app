<?php

use App\Http\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Basic routing
Route::get('/welcome', function () {
    return 'Welcome to Basic Routing';
});

Route::get('/contact', function () {
    return view('contact');
});

// Named Routes
Route::get('/about', function () {
    return 'About Us';
})->name('about');

// Required parameter routing
Route::get('/user/{id}', function ($id) {
    return 'User ID: '.$id;
});

// Optional Parameters
Route::get('/items/{category?}/{item?}', function ($category = 'Food', $item = 'Rice') {
    return 'Category is '.$category.'. Item is '.$item;
});

// Middleware Routes
Route::middleware(['CheckRole'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/settings', function () {
        return 'Admin Settings';
    });
});

Route::resource('posts', App\Http\Controllers\PostController::class);
Route::get('/twoposts/{parameter1}/{parameter2}', 'App\Http\Controllers\PostController\@twoposts')->name('route.link');