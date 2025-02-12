<?php

namespace App\Http\Controllers;

use App\Models\MyBlog;
use App\Models\Product;
use App\Models\User;
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

    function eloquent () {
        /*
        $user = new User();
        $user->name = 'John Cena';
        $user->email = 'cena@gmail.com';
        $user->password = '12345';
        $user->save();
        */

        /*
        $product = new Product();
        $product->name = 'Redragon';
        $product->description = 'K617 Fizz';
        $product->price = 1210.90;
        $product->save();
        */

        $users = User::all();
        /*foreach($users as $user){
            echo $user->name . ' --- ' . $user->email;
            echo '<br>';
        }*/

        // echo $users->where('id',1)->first();

        // find only works with id
        dd($users->find(1));

        return "Weeee";
    }

    function eloquentUpdate() {
        // $user = User::where('id', 4)->first();
        //$user->email = 'verrysure@gmail.com';
        // $user->save();

        // DELETING data from db
        // $user->delete();

        // eger bulamazsa hata verir // çözüm // Hata alınca 404 döner
        User::findOrFail(2)->delete();

        return 'EWWWWW';
    }

    function mass() {
        // email_verified_at istesede bunu yazmak db'e --> izin vermez mass assignment
        /*User::create([
            'name' => 'test user',
            'email' => 'test@gmail.com',
            'password' => '12345',
            'email_verified_at' => 'hello',
        ]);*/

        // insert ile mesela password'da hashleme olmadan zorlama ile insert olur
        User::insert([
            'name' => 'test user 2',
            'email' => 'testuser@gmail.com',
            'password' => '12312414',
        ]);

        return 'mass assignment';
    }

    function Conditional(){
        // $product = Product::where(['id' => 1, 'price' => 319])->get();
        // $product = Product::where('id' , 1)->where('price','>',300)->get();

        // orWhere ilk sorgu boş dönerse diğerine bak demek
        //$product = Product::where('name','LIKE' , '%Mwr.%')->orWhere('description','LIKE','%a%')->get();

        // bunların içinde mi ?
        // $product = Product::whereIn('id', [1,2,3,4,5])->get();

        $product = Product::whereBetween('price',[0,400])->get();

        dd($product);

        return 'Conditional';
    }

    function scope() {
        // sadece Active demen yetecektir scopeActive için
        $blogs = MyBlog::Active()->get();
        dd($blogs);

        return 'hi';
    }

    function softdelete() {
        // deleted olarak işaretleninc sonrasında çekmek istesende laravel sana onu göstermez
        // Product::find(1)->delete();
        
        // silinmiş verilerde gelsin istersen listede
        // $products = Product::withTrashed()->get();

        // veriyi geri getirmek -- geri null yapar
        // Product::withTrashed()->find(1)->restore();
    
        // tamamen silmek nasıl olur ?
        Product::withTrashed()->find(1)->forceDelete();
        
        //dd($products);
        return 'hi';
    }
}
