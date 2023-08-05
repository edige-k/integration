<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductBuyRequest;
use App\Services\Actions\User\ProductAction;
use App\Services\Factory\PaymentCardFactory;
use App\Services\Tasks\Payments\GetTotalPriceTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function show(){
        return view('user.product');
    }
    public function handlePayment(ProductBuyRequest $request) {
        $selectedCard = $request->get('payment_card');
        $getTotalprice = app(GetTotalPriceTask::class)->getTotalPrice($request);
        try {
            $paymentCard = PaymentCardFactory::createPaymentCard($selectedCard);
            return $paymentCard->redirect($getTotalprice,$request);
        } catch (\Exception $e) {
            // Handle any errors or invalid selections here
            return "Error: " . $e->getMessage();
        }
    }


}
