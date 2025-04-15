<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// 
Route::get('/dont{locale?}', function ($locale = 'en') {
    if (!in_array($locale, ['en', 'tr'])) {
        $locale = 'en';
    }

    App::setLocale($locale);
    Session::put('locale', $locale);
    return view('locale');
});

Route::get('/', function (Request $request) {
    $locale = $request->query('lang', 'en');

    if (!in_array($locale, ['en', 'tr'])) {
        $locale = 'en';
    }

    App::setLocale($locale);
    Session::put('locale', $locale);

    return view('locale');
})->name('home');
