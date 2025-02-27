<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/inner-join', function() {
    // inner join
    $userWithOrders = DB::table('users')
            ->join('orders', 'users.id','=', 'orders.user_id')
            ->select('users.*','orders.product_name','orders.total_amount')
            ->get();

    return response()->json($userWithOrders);
});

Route::get('/left-join', function() {
    // left join
    $userWithOrders = DB::table('users')
        ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'orders.product_name', 'orders.total_amount')
        ->get();

    // user tablosu soldaki tablo oluyor -- ayrıca her şekilde tüm kullanıcılar kesin gelcek diyor eşleme aramıyor
    // LEFT JOIN kullanıldığında sol (ilk) tablodaki tüm kayıtlar getirilir, eşleşmeyen satırlar için sağ (ikinci) tablodan NULL değerleri döner.

    return response()->json($userWithOrders);
});


Route::get('/right-join', function() {
    $ordersWithUsers = DB::table('orders')
        ->rightJoin('users', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'orders.product_name', 'orders.total_amount')
        ->get();

        // aynı left join gibi

    return response()->json($ordersWithUsers);
});


Route::get('/full-join', function() {
    // birlestiriyor -- duplicated olanları atıyor -- EĞER duplicated'te gelsin diyorsan unionall() kullancan
    $leftJoin = DB::table('users')
        ->leftJoin('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'orders.product_name', 'orders.total_amount');

    $rightJoin = DB::table('users')
        ->rightJoin('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'orders.product_name', 'orders.total_amount');

    // UNION ile iki sorguyu birleştiriyoruz
    $fullJoin = $leftJoin->union($rightJoin)->get();

    return response()->json($fullJoin);
});



/**
Kullanıcı (users)	Sipariş (orders)	LEFT JOIN Sonucu	RIGHT JOIN Sonucu
1 - Ali	Laptop	✅ Ali - Laptop	✅ Ali - Laptop
2 - Ayşe	Telefon	✅ Ayşe - Telefon	✅ Ayşe - Telefon
3 - Veli	NULL	✅ Veli - NULL	❌ Veli Gelmez
NULL	Tablet	❌ Tablet Gelmez	✅ NULL - Tablet
 */