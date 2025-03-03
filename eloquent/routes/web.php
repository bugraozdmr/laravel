<?php

use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Constraint\Count;

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

Route::get('/tag-create', function() {
    Tag::insert([
        [
            'name' => 'Php'
        ],
        [
            'name' => 'Laravel'
        ],
        ]);

    return 'success';
});

Route::get('/map-posts', function() {
    $post = Post::first();
    $tag = Tag::first();

    $post->tags()->attach($tag);
    // kaldırmak
    // $post->tags()->detach([1]);

    // otomatik güncelleme sonrası düzenler - senin manuel olarak ilgilenmene gerek yoktur
    // $post->tags()->sync([2,3]);

    //return view('post', data: compact('posts'));
    return 'ok';
});

Route::get('tags', function() {
    $tags = Tag::all();

    return view('tag', compact('tags'));
});

Route::get('location-add', function() {
    $country = new Country(['name' => 'United States']);
    $country->save();

    $state = new State(['name' => 'New York']);
    $country->states()->save($state);

    $state->cities()->createMany([
        ['name' => 'Los Angeles'],
        ['name' => 'San Francisco']
    ]);

    return view('location');
});

Route::get('location', function() {
    $country = Country::first();

    return view('location', compact('country'));
});

Route::get('image', function() {
    /* $user = User::find(1);
    $user->image()->create([
        'path' => '/uploads/user_one.jpg',
    ]); */

    /*$post = Post::find(1);
    // erişilebilir kılmıştık
    $post->image()->create([
        'path' => '/uploads/user_one.jpg'
    ]);*/


    $post = Post::find(1);
    return $post->image;
});