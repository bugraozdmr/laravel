<?php

use App\Events\NewMessage;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('messages', function () {
    return view('messages');
});

// id değeri user_id ile aynı olmalı yoksa getirmez çünkü oraya bağlı olarak algılamaz
Route::get('send-message', function () {
    event(new NewMessage('Hello World!',2));

    dd('message sent');
});

Route::get('/send-custom', function () {
    $message = request('message', 'Default message');
    
    event(new NewMessage($message,2));

    return 'Message sent: ' . $message;
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
