<?php

namespace App\Services\Actions\Auth;

use App\Services\Contracts\Auth\LogoutContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutAction implements LogoutContract
{

    public function execute(Request $request)
    {
        $this->logout($request);
        return redirect('/login');
    }

    private function logout(Request $request){
        $currentSessionId = session()->getId();
        $user = Auth::user();
        $user->sessions()->where('id', $currentSessionId)->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
