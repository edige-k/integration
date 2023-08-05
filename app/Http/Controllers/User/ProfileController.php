<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Contracts\User\ProfileContract;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        return app(ProfileContract::class)->execute($user);
    }
}
