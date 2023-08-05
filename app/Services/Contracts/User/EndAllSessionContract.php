<?php

namespace App\Services\Contracts\User;

use Illuminate\Http\Request;



interface EndAllSessionContract
{
    public function execute(Request $request);

}
