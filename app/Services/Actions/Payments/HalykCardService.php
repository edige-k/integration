<?php

namespace App\Services\Actions\Payments;

use App\Http\Requests\ProductBuyRequest;
use App\Services\Contracts\User\PaymentCardInterface;
use App\Services\Tasks\Payments\GetTotalPriceTask;
use Illuminate\Support\Facades\Http;

class HalykCardService implements PaymentCardInterface
{
    public function redirect(float $totalPrice,ProductBuyRequest $request)
    {

        $grant_type = "client_credentials";
        $scope = "webapi usermanagement email_send verification statement statistics payment";
        $client_id = 'test';
        $client_secret = "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG";
        $invoiceID = "104804901";
        $amount = $totalPrice;
        $currency = "KZT";
        $terminal="67e34d63-102f-4bd1-898e-370781d0074d";

        $auth_url='https://testoauth.homebank.kz/epay2/oauth2/token';

        $auth = Http::asForm()->post($auth_url, [
            'grant_type' => $grant_type,
            'scope' => $scope,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'invoiceID' => $invoiceID,
            'amount' => $amount,
            'currency' => $currency,
            'terminal' => $terminal,
        ])->json();


        return view('user.payment_page',compact('auth','invoiceID','amount','terminal'));
    }
}
