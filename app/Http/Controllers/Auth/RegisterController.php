<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\Auth\RegisterContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterController extends Controller
{

    public function index(): View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        return  app(RegisterContract::class)->execute($request);
    }
}
