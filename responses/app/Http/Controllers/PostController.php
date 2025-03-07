<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostController extends Controller
{
    use HasFactory;

    function index() {
        // return 'hi';
        // return redirect()->action([PostController::class, 'create']);
        // return redirect()->away('https://www.google.com');
        // return to_route('post.create');

        // return redirect()->back();
        
        /*return response()->json([
            'first_name' => 'grant',
            'last_name' => 'Wick',
        ]);*/

        // return ['name'=>'grant','state'=>'Istanbul'];
        // return response()->download(public_path('uploads/sunset.jpg'));

        // dosyayı getirir
        return response()->file(public_path('uploads/HateSpeechDetection.csv'));
    }

    function create() {
        return 'да';
    }
}
