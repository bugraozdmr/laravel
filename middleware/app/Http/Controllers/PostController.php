<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRole;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller
{

    function index() {
        return view('post.index');
    }

    function store(Request $request) {
        // return "here";
        dd($request->all());die();
    }
}
