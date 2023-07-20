<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('index');
    Route::get('/home', 'home')->name('home');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/my-account/{id}', 'myAccount')->name('my.account');
});

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs/home', 'blogs')->name('blogs');
    Route::get('/blogs/add', 'add')->name('blogs.add');
    Route::post('/blogs/create', 'create')->name('blogs.create');
    Route::get('/blogs/{id}', 'show')->name('blogs.details');
    Route::get('/blogs/{id}/edit', 'edit')->name('blogs.edit');
    Route::get('/blogs/{id}/delete', 'delete')->name('blogs.delete');
    Route::get('/blogs/{id}/like', 'like')->name('blogs.like');
});

Route::controller(FormController::class)->group(function () {
    Route::put('/blogs/{id}', 'submitForm')->name('blogs.edit.submitForm');
    Route::get('/blogs/sort', 'sortByRate')->name('sortByRate');
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/send-email', 'sendEmail')->name('send.email');
    Route::post('/my-account-edit/{id}', 'myAccountEdit')->name('my.account.edit');
});

Route::get('/blogs', [SearchController::class, 'search'])->name('search');

