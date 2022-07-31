<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    //Wohin wird weitergeleitet nachdem das Passwort zurückgesetzt wurde?

    use ResetsPasswords;

    /**
     * 
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
