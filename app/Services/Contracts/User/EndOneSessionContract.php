<?php

namespace App\Services\Contracts\User;

use App\Models\Session;
use Illuminate\Http\Request;

interface EndOneSessionContract
{
    public function execute(string $session);
}
