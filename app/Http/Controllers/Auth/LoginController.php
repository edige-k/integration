<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\Auth\LoginContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function index(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        return  app(LoginContract::class)->execute($request);
    }
}
