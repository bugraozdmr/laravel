<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/album', function () {
    return view('album.index');
})->name('album');

// fallback route -- ALWAYS have to be the bottom
Route::fallback(function(){
    return 'Oppppss we couldnt find the page you are looking';
});

// we dont need to use contact.blade.php => only contact will do the magic
Route::get('/contact', function() {
    $title = 'Contact Page';
    $description = 'Contact with us freely.';
    $staffs = ['John Doe', 'Grant Wick', 'Mr.Beast'];
    return view('contact.contact', [
        'title' => $title,
        'description' => $description,
        'staffs' => $staffs,
    ]); // if this path under a dir use . instead / -- it also wokrs thou
})->name('contact');
