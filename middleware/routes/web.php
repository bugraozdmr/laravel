<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::group(['middleware' => CheckRole::class], function() {
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
});*/


// Route::get('/post', [PostController::class, 'index'])->name('post.index')->middleware('test-group');
Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('checkRole');

// Route::post('/post', [PostController::class, 'store'])->name('post.store');



/**
php artisan route:list -v

GET|HEAD   / ................................................................................................................ 
            ⇂ web
GET|HEAD   post ........................................................................... post.index › PostController@index
            ⇂ web
POST       post ........................................................................... post.store › PostController@store
            ⇂ web
 */


Route::get('user/dashboard', function() {
    dd('User Dashboard');
})->middleware('checkRole:user,something11');

Route::get('admin/dashboard', function() {
    dd('Admin Dashboard');
})->middleware('checkRole:admin,smt');  // parametre passlamak