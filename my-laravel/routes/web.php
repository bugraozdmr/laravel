<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use App\Models\MyBlog;
use Illuminate\Support\Facades\Route;

// Route::group -> bunu kullan sonra

Route::get('/', function () {
    return view('welcome');
});

Route::get('/album', [HomeController::class, 'album'])->name('album');

// give the full class
Route::get('/index', [HomeController::class, 'index']);

// only one method exist so no need []
Route::get('/single-action', SingleActionController::class);

/*Route::group(['prefix' => 'blog', 'as' => 'blog.'],function() {
    Route::post('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/show', [BlogController::class, 'show'])->name('show');
    Route::post('/update', [BlogController::class, 'update'])->name('update');
    Route::post('/delete', [BlogController::class, 'delete'])->name('delete');
});*/

//Route::resource('/blog', BlogController::class);

Route::get('/blog', function() {
    $blogs = MyBlog::all();   // SELECT * FROM blogs
    // dump and die
    dd($blogs);
});

/*
// fallback route -- ALWAYS have to be the bottom
Route::fallback(function(){
    return 'Oppppss we couldnt find the page you are looking';
});

// we dont need to use contact.blade.php => only contact will do the magic
Route::get('/contact', function() {
    $title = 'Contact Page';
    $description = 'Contact with us freely.';
    $staffs = ['John Doe', 'Grant Wick', 'Mr.Beast'];
    return view('contact.contact', [
        'title' => $title,
        'description' => $description,
        'staffs' => $staffs,
    ]); // if this path under a dir use . instead / -- it also wokrs thou
})->name('contact');
*/