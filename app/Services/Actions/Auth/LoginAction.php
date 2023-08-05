<?php

namespace App\Services\Actions\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Session;
use App\Services\Contracts\Auth\LoginContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginAction implements LoginContract
{

    public function execute(LoginRequest $request)
    {

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('profile');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }


}
