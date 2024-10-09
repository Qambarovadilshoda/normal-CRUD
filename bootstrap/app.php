<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Middleware\CheckNotAuthMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        return $middleware->alias([
            'checkAuth' => CheckAuthMiddleware::class,
            'checkNotAuth' => CheckNotAuthMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
