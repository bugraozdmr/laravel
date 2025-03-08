<?php

use Illuminate\Http\Request;
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