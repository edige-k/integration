<?php

namespace App\Services\Tasks\Payments;

class GetTotalPriceTask
{
    public function getTotalPrice($request):float{
        $price = $request->get('price');
        $quantity = $request->get('quantity');
        return $price*$quantity;
    }
}
