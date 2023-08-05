<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Services\Contracts\User\EndAllSessionContract;
use App\Services\Contracts\User\EndAllSessionExceptOneContract;
use App\Services\Contracts\User\EndOneSessionContract;
use Illuminate\Http\Request;

class EndSessionController extends Controller
{
    public function endOneSession(string $session){
        return app(EndOneSessionContract::class)->execute($session);
    }
    public function endAllSession(Request $request){
        return app(EndAllSessionContract::class)->execute($request);
    }
    public function endAllSessionExceptOne(){
        return app(EndAllSessionExceptOneContract::class)->execute();
    }
}
