<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// this part has already defined in the echo.js & messages.blade.php files
Broadcast::channel('chat.{id}', function($user, $id) {
    return $user->id == $id;
});

// presence
Broadcast::channel('online', function($user) {
    return $user->toArray();
});