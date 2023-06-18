<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::put('/blogs/{id}', [FormController::class, 'submitForm']);


Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', 'blogs');
    Route::get('/blogs/add', 'add');
    Route::get('/blogs/create', 'create');
    Route::get('/blogs/{id}', 'show');
    Route::get('/blogs/{id}/edit', 'edit');
    Route::get('/blogs/{id}/delete', 'delete');
    Route::get('/blogs/{id}/like', 'like');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/index', 'index');
    Route::get('/contact', 'contact');
});


Route::get('/blogs', [SearchController::class, 'search'])->name('search');
