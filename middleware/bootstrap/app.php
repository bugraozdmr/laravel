<?php

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(TestMiddleware::class);
        // $middleware->append(CheckRole::class);

        // groupladık middlewareleri
        /*$middleware->appendToGroup('test-group', [
            TestMiddleware::class,
            CheckRole::class
        ]);*/

        // artık default web'e bunlarıda ekledik
        /*$middleware->web(append: [
            TestMiddleware::class,
            CheckRole::class
        ]);*/

        // api route vs. 'de var farklı farklı route groupları

        // alias tanımlamak
        $middleware->alias([
            'checkRole' => CheckRole::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
