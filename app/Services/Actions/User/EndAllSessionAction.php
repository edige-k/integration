<?php

namespace App\Services\Actions\User;

use App\Services\Contracts\User\EndAllSessionContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndAllSessionAction implements EndAllSessionContract
{

    public function execute(Request $request)
    {
        $this->endSession($request);
        return redirect('');
    }

    private function endSession(Request $request){
        $user = Auth::user();
        $user->sessions()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
