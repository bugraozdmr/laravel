<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    function index() {
        return view('fileUpload');
    }

    function store(Request $request) {
        // dd($request->all());
        
        // storage altında tut dedik -> private'e koydu // app/private altında isim değişerek aldı
        // $file = Storage::disk('local')->put('/',$request->file('file'));

        // yine private farklı yöntem
        // $file = $request->file('file')->store('/','local');

        // public tutmak
        $file = $request->file('file')->store('/', 'public');


        dd($file);
    }
}
