<?php

namespace App\Services\Contracts\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\RedirectResponse;

interface RegisterContract

{
    public function execute(RegisterRequest $request);
}

