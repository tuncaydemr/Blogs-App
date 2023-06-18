<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);





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


Route::get('/blogs', [SearchController::class, 'search'])->name('search');
