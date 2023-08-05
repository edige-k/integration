<?php

namespace App\Services\Tasks\Payments;

class GetOrderIdTask
{
    public static function getOrderId(): int
    {
        $minNumber = 100000000;

        $maxNumber = 999999999;

        return mt_rand($minNumber, $maxNumber);
    }
}
