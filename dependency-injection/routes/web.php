<?php

use App\Facades\Notification;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('test', SampleController::class);

Route::resource('product', ProductController::class);


Route::get('test-me',function() {
    dd(app());
});

Route::get('get', function() {
    echo app()->make('test_service');
});



Route::get('get-me', function() {
    //$notification = app(NotificationService::class);
    //dd($notification->send('Hello', 'test'));

    $notification = Notification::send('Hello', 'test@example.com');
    dd($notification);
});