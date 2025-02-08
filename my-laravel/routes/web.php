<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Methods
/**
 * 1.GET
 * 2. POST
 * 3. PUT
 * 4. PATCH
 * 5. DELETE
 * 6. OPTIONS
 * 7. HEAD
 */

Route::get('get-route', function() {
    return;
});

Route::post('post-route', function() {
    return;
});

Route::put('put-route', function() {
    return;
});

Route::patch('patch-route', function() {
    return;
});

Route::delete('delete-route', function() {
    return;
});

// fallback route -- ALWAYS have to be the bottom
Route::fallback(function(){
    return 'Oppppss we couldnt find the page you are looking';
});