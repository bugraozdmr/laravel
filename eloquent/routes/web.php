<?php

use App\Models\Address;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/relation',function() {
    $users = User::all();
    $address = Address::all();
    return view('test', compact('users','address'));
});

Route::get('/posts-create', function() {
    Post::insert([
        [
            'user_id' => 2,
            'name' => 'AI is crazy'
        ],
        [
            'user_id' => 1,
            'name' => 'Learn how to defend yourself'
        ],
        ]);
});

Route::get('/posts', function() {
    $posts = Post::all();
    return view('posts', compact('posts'));
});