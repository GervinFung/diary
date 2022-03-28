<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        // dk how to do yet
        // if ($request->is('user') || !$request->is('/') || !$request->is('/sign') || !$request->is('/')) {
        //     return redirect()->guest('/sign-in');
        // }
    }
}
