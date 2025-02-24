<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('customer.index');
    return redirect()->route('customers.index');
})->name('home');

// resource olarak al dedik bu şekilde tüm route'ları gelcek otomatik (tanımlancak) -- php artisan route:list
Route::resource('customers', CustomerController::class);


Route::prefix('api')->group(function () {
    Route::get('/customers', [CustomerController::class, 'getAllCustomers']);
});
