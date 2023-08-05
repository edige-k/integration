<?php

namespace App\Services\Actions\User;


use App\Services\Contracts\User\EndOneSessionContract;

use Illuminate\Support\Facades\Auth;

class EndOneSessionAction implements EndOneSessionContract
{

    public function execute(string $session)
    {
        $this->endSession($session);
        return redirect('/user');
    }

    private function endSession(string $session){
        $user = Auth::user();
    return $user->sessions()->where('id', $session)->delete();

    }
}
