<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class HomeController extends Controller
{
    function index() {

        /* Insert data
        DB::table('users')->insert([
            [
                'name' => 'Grant Wick',
                'email' => 'grant1@gmail.com',
                'password' => 'grant123',
            ],
            [
                'name' => 'Polat Alemdar',
                'email' => 'polat@gmail.com',
                'password' => 'polat123',
            ]
        ]);
        */

        // fetch data // direkt api için böyle kullanırım direkt json dönüyor manyakkk harika
        // $users = DB::table('users')->get()->where('id',1)->first();
        
        // çifte sorgu
        // $users = DB::table('users')->get()->where('name','Grant Wick')->where('id',1)->first();
        
        // 2 olmayan
        // $users = DB::table('users')->get()->where('id','>',1)->first();
        // return $users;

        // UPDATE
        DB::table('users')->where('id', 1)->update([
            'name' => 'grant alemdar'
        ]);

        // DELETE
        DB::table('users')->where('id',2)->delete();

        return view('welcome');
    }

    function album(){
        return view('album.index');
    }

    function doit() {
        // tek tek ceker Collection döner
        // $titles = DB::table('blogs')->select('title')->get();
        // bu ise daha farklı duz 10 tane alt alta çekti bir bak
        // $titles = DB::table('blogs')->pluck('title');

        // direkt array istersek
        $titles = DB::table('blogs')->pluck('title','id')->toArray();
        dd($titles);


        return 'hi';
    }

    function aggregate() {
        // short dd
        // $products = DB::table('products')->get()->dd();

        // $products = DB::table('products')->max('price');
        // $products = DB::table('products')->sum('price');
        $products = DB::table('products')->avg('price');
        dd($products);

        return 'dummy';
    }
}
