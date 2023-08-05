<?php

namespace App\Services\Actions\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\Contracts\Auth\RegisterContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegisterAction implements RegisterContract
{
    public function execute(RegisterRequest $request)
    {

       $user= $this->createUser($request);
        Auth::login($user);
        return redirect()->route('profile');
    }
    private function createUser(RegisterRequest $request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
