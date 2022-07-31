<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**CSRF ist nicht gesetzt, wenn der Browser ein Cookie mit dem Namen _token hat.
     * CSRF bringt hier einen Fehler, wenn der Browser ein Cookie mit dem Namen _token hat.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
