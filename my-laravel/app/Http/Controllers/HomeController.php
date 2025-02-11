<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        return view('welcome');
    }

    function album(){
        return view('album.index');
    }
}
