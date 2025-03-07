<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    // return 'Post List';
    // return redirect('/post/create');
    // return redirect()->route('post.create', ['user' => 'Grant Wick', 'id' => 13]);
    return to_route('post.create', ['user' => 'Grant Wick', 'id' => 13]);
})->name('post.index');

// http://localhost:8000/post/create/13?user=Grant%20Wick //// bu tarz oldu
Route::get('/post/create/{id}', function () {
    //return 'Post Create';
    dd(request()->all());
})->name('post.create');

Route::get('/postc', [PostController::class,'index']);

Route::get('/postc/create', [PostController::class,'create']);