<?php

namespace App\Services\Actions\Payments;

use App\Http\Requests\ProductBuyRequest;
use App\Services\Contracts\User\PaymentCardInterface;

class KaspiCardService implements PaymentCardInterface
{

    public function redirect(float $totalPrice,ProductBuyRequest $request)
    {

    }
}
