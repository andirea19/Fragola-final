<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Kein Reporting für Exceptions wenn -
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //nie
    ];

    /** Flash-Messages für Exceptions/Input, der nicht zu einer Exception geführt hat.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register Callback
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
