<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\BlockedUser;
use App\Http\Middleware\NoCacheMiddleware;
use App\Http\Middleware\Panitia;
use App\Http\Middleware\RedirectIfAdminAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'checkrole' => Admin::class,
            'no-cache' => NoCacheMiddleware::class,
            'admin-role' => RedirectIfAdminAuthMiddleware::class

        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
