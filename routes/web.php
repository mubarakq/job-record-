<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::group(['controller' => 'JobController'], function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/{job}', 'show');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::put('/jobs/{job}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

Route::group(['controller' => 'EmployerController'], function () {
    Route::get('/employers', 'index');
    Route::get('/employers/{employer}', 'show');
    Route::get('/employers/create', 'create');
    Route::post('/employers', 'store');
    Route::get('/employers/{employer}/edit', 'edit');
    Route::put('/employers/{employer}', 'update');
    Route::delete('/employers/{employer}', 'destroy');
});

Route::group(['controller' => 'RegisterController'], function () {
    Route::get('/register', 'create');
    Route::post('/register', 'store');
});

Route::group(['controller' => 'SessionController'], function () {
    Route::get('/login', 'create');
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy');
});
