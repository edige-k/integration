<?php

namespace App\Services\Actions\User;

use App\Services\Contracts\User\EndAllSessionExceptOneContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EndAllSessionExceptOneAction implements EndAllSessionExceptOneContract
{

    public function execute()
    {

        $this->endSession();
        return redirect('/user');
    }

    private function endSession(){
        $currentSessionId = session()->getId();

        $user = Auth::user();
      return  $user->sessions()->where('id', '!=', $currentSessionId)->delete();

    }
}
