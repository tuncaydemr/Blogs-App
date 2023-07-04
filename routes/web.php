<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/index', 'index')->name('home');
    Route::get('/contact', 'contact');
});

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', 'blogs');
    Route::get('/blogs/add', 'add');
    Route::post('/blogs/create', 'create');
    Route::get('/blogs/{id}', 'show');
    Route::get('/blogs/{id}/edit', 'edit');
    Route::get('/blogs/{id}/delete', 'delete');
    Route::get('/blogs/{id}/like', 'like');
});

Route::put('/blogs/{id}', [FormController::class, 'submitForm']);
Route::get('/blogs', [SearchController::class, 'search'])->name('search');
Route::get('/blogs/sort', [FormController::class, 'sortByRate'])->name('sortByRate');
