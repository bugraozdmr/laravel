<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File as customfile;

class FileUploadController extends Controller
{
    function index() {
        // db'den silinirken storage'danda almam lazım ondan find ile bul önce
        //$file = FileUpload::find(7);
        // nerden silceğini bilmen lazım public_path mi storage_path mi
        //customfile::delete(public_path($file->file_path));
        //$file->delete();

        $files = FileUpload::all();
        return view('fileUpload',['files' => $files]);
    }

    function store(Request $request) {
        // dd($request->all());
        
        // storage altında tut dedik -> private'e koydu // app/private altında isim değişerek aldı
        // $file = Storage::disk('local')->put('/',$request->file('file'));

        // yine private farklı yöntem
        // $file = $request->file('file')->store('/','local');

        // public tutmak
        // $file = $request->file('file')->store('/', 'public');

        // custom upload folder -- bu şekilde public/uploads altına kaydedildi
        // $file = $request->file('file')->store('/', 'dir_public');

        // dd($file);

        // validation
        $request->validate([ // 3000kb
            //'file' => ['required','file','mimes:zip,pdf,csv','max:3000']
            'file' => ['required', 'image']
        ]);


        $file = $request->file('file');
        $customName = 'laravel_' . Str::uuid();
        $ext = $file->getClientOriginalExtension();
        $fileName = $customName.'.'.$ext;

        $path = $file->storeAs('/', $fileName, 'dir_public');

        $fileStore = new FileUpload();
        $fileStore->file_path = '/uploads/'.$path;
        $fileStore->save();

        // dd('stored');
        
        // geri donsun diyoruz
        // return redirect()->back();
    
        //return redirect()->route('home');

        // gibi
        //return redirect()->away('https://www.google.com');
    
        return redirect('/');
    }

    function download() {
        // sebebi bilinmiyor public değil private'i indirdi
        // storage/private/file.txt

        // kırmızı yanıyor ama çalışıyor
        return Storage::disk('local')->download('h5DhjMNnkk04jf4bLufWwvokWgyncsNyLvZ7Wk6n.txt');
    }
}
