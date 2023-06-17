<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);





Route::put('/blogs/{id}', [FormController::class, 'submitForm']);
Route::get('/blogs/{id}/like', [BlogsController::class, 'update']);

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', 'blogs');
    Route::get('/blogs/add', 'add');
    Route::get('/blogs/create', 'create');
    Route::get('/blogs/{id}', 'show');
    Route::get('/blogs/{id}/edit', 'editForm');
    Route::get('/blogs/{id}/delete', 'delete');
});
