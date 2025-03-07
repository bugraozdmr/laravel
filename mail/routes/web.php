<?php

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('send-mail', function() {
    return view('send-mail');
});

// bu şekilde gidiyor да
Route::post('send-mail', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    /*
    Mail::raw($request->message, function($message) use ($request) {
        $message->to($request->email)
                ->subject('Laravel Test Mail');
    });
    */

    // меня зовут Грант

    // Mail::to($request->email)->send(new SendMail($request->message));

    // queu alarak beklemeden program çalışır
    Mail::to($request->email)->queue(new SendMail($request->message));

    return back()->with('success', 'Mail successfully sent!');
})->name('send-mail.submit');