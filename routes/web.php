<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blogs', [BlogsController::class, 'blogs']);
Route::get('/blogs/edit', [BlogsController::class, 'edit']);
Route::get('/blogs/create', [FormController::class, 'create']);
Route::get('/blogs/{id}', [BlogsController::class, 'show']);
Route::get('/blogs/{id}/delete', [BlogsController::class, 'delete']);
Route::get('/blogs/{id}/edit', [FormController::class, 'editForm']);
Route::put('/blogs/{id}', [FormController::class, 'submitForm']);
