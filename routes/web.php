<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\JobsController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::controller(JobsController::class)->group( function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::put('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

Route::controller(EmployerController::class)->group(function () {
    Route::get('/employers', 'index');
    Route::get('/employers/{employer}', 'show');
    Route::get('/employers/create', 'create');
    Route::post('/employers', 'store');
    Route::get('/employers/{employer}/edit', 'edit');
    Route::put('/employers/{employer}', 'update');
    Route::delete('/employers/{employer}', 'destroy');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create');
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy');
});
