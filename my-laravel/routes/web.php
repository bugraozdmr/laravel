<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// static method access
Route::get('/about', function() {
    return 'This is a home page';
})->name('about');

// we could also use slug // recommended
Route::get('/user/{id}', function($id) {
    return 'here is the id: ' . $id;
})->name('getuser');

// group of routes which is working exactly same as before
// blog. it helps you when you run php artisan route:list
Route::group(['prefix' => 'blog', 'as' => 'blog.'] ,function() {
    Route::get('/create', function() {
        return "This is blog create Page";
    })->name('create');

    Route::get('/edit', function() {
        return "This is blog edit Page";
    })->name('edit');

    Route::get('/show', function() {
        return "This is blog show Page";
    })->name('show');
});