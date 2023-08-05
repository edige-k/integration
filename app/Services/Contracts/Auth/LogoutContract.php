<?php

namespace App\Services\Contracts\Auth;

use Illuminate\Http\Request;

interface LogoutContract
{
    public function execute(Request $request );

}
