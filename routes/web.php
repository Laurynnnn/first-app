<?php

use App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Models\Patient;
use App\Http\Controllers\LabController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;

Route::resource('patients', PatientController::class);
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('articles', ArticleController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/labs', [LabController::class,'index'])->name('');


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

// // Middleware Routes
// Route::middleware(['CheckRole'])->prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Admin Dashboard';
//     });

//     Route::get('/settings', function () {
//         return 'Admin Settings';
//     });
// });



// Route::get('/', function () {
//     $patients = Patient::all();
//     return view('patients.index', compact('patients'));
// });