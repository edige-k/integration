<?php

namespace App\Services\Contracts\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;

interface LoginContract
{
    public function execute(LoginRequest $request);
}
