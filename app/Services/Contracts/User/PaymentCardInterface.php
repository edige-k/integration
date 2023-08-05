<?php

namespace App\Services\Contracts\User;

use App\Http\Requests\ProductBuyRequest;

interface PaymentCardInterface
{
    public function redirect(float $totalPrice,ProductBuyRequest $request);
}
