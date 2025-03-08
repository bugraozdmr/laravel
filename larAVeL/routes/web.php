<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('welcome');
});

Route::get('components', function() {
    return view(view: 'blade-component');
});

Route::get('session', function(Request $request) {
    // 1. yontem
    // $request->session()->put('foo',['bar', 'laravel', 'vue']);

    // 2. yontem
    // session(['key' => 'value']);

    // 3. yontem
    Session::put('test', 'bar');

    // silmek session'u
    // ! 1. yontem
    // $request->session()->forget('test');

    // ! 2. yontem
    // session()->forget('foo');

    // ! 3. yontem
    Session::forget(['cart', 'foo', 'test']);

    // * 1. yontem
    // $foo = $request->session()->get('test');

    // * 2. yontem
    $foo = Session::get('foo');

    return view('session', compact('foo'));
});

Route::get('cache', function() {
    Cache::put('post', 'post title one', $seconds = 5);
});

Route::get('get-cache', function() {
    $value = Cache::get('post');
    return $value;
});

Route::get('gimme-cache', function() {
    // önce db'e yazıyor sonra memorye yazıyor 
    $users = Cache::rememberForever('users', function() {
        return User::all();
    });

    return view('cache',compact('users'));
});

Route::get('remove-cache', function() {
    // bu çekiyor sonra kaldırıyor
    // $users = Cache::pull('users');

    // bu direkt kaldırıyor 1 döner
    $users = Cache::forget('users');

    if(Cache::has('users')){
        dd('data is in cache');
    }

    return $users;
});