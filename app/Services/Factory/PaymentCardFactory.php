<?php

namespace App\Services\Factory;

use App\Http\Requests\ProductBuyRequest;
use App\Services\Actions\Payments\HalykCardService;
use App\Services\Actions\Payments\JusanCardService;
use App\Services\Actions\Payments\KaspiCardService;
use App\Services\Tasks\Payments\GetTotalPriceTask;


class PaymentCardFactory
{
    public static function createPaymentCard( string $type): JusanCardService|KaspiCardService|HalykCardService
    {
        switch ($type) {
            case 'kaspi':
                return new KaspiCardService();
            case 'halyk':
                return new HalykCardService();
            case 'jusan':
                return new JusanCardService();
            default:
                throw new \Exception('Invalid payment card type');
        }
    }
}
