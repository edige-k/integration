<?php

namespace App\Services\Actions\Payments;

use App\Http\Requests\ProductBuyRequest;
use App\Services\Contracts\User\PaymentCardInterface;
use App\Services\Tasks\Payments\GetOrderIdTask;
use App\Services\Tasks\Payments\GetTotalPriceTask;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class JusanCardService implements PaymentCardInterface
{

    public function redirect(float $totalPrice,ProductBuyRequest $request)
    {
        $order = GetOrderIdTask::getOrderId();
        $total_price =$totalPrice;
        $currency = 'KZT';
        $merchant='ECOM_JYSAN';
        $client_id= $request->user()->id;
        $terminal = 'WEB00008';
        $language='ru';
        $desc = 'test_crd';
        $desc_order = 'test_crd1';
        $email='';
        $backref = '';
        $nonce=$this->getNonce();
        $ucaf_flag='';
        $ucaf_authentication_data='';
        $recur_freq='';
        $recur_exp='';
        $int_ref='';
        $recur_ref='';
        $tavv ='';
        $ext_mpi_eci='';
        $payment_to =Hash::make( '');
        $p_sign = hash("sha512",
            1698498161884 . $order. ";" . $total_price . ";" . $currency . ";" . $merchant . ";" . $terminal . ";" .
            $nonce . ";" . $client_id . ";" .
            str_replace(["\n", "\r"], "", $desc) . ";" .
            str_replace(["\n", "\r"], "", $desc_order) . ";" .
            $email . ";" .$backref . ";" .
            $ucaf_flag . ";" . $ucaf_authentication_data . ";" .
            $recur_freq . ";" . $recur_exp . ";" .
            $int_ref . ";" . $recur_ref . ";" .
            $payment_to . ";" );
        $mk_token='';
        $merch_token_id='';
        return Http::post('https://ecom.jysanbank.kz/ecom/api', [
            'ORDER' => $order,
            'AMOUNT' => $total_price,
            'CURRENCY'=> $currency,
            'MERCHANT'=>$merchant,
            'TERMINAL'=>$terminal,
            'LANGUAGE'=>$language,
            'CLIENT_ID'=>$client_id,
            'DESC'=>$desc,
            'DESC_ORDER'=>$desc_order,
            'EMAIL'=>$email,
            'BACKREF'=>$backref,
            'NONCE'=>$nonce,
            'Ucaf_Flag'=>$ucaf_flag,
            'Ucaf_Authentication_Data'=>$ucaf_authentication_data,
            'RECUR_FREQ'=>$recur_freq,
            'RECUR_EXP'=>$recur_exp,
            'INT_REF'=>$int_ref,
            'RECUR_REF'=>$recur_ref,
            'TAVV'=>$tavv,
            'EXT_MPI_ECI'=>$ext_mpi_eci,
            'crd_pan'=>'',
            'crd_exp'=>'',
            'crd_cvc'=>'',
            'PAYMENT_TO'=>$payment_to,
            'P_SIGN'=>$p_sign,
        ]);
    }


    private function getNonce():int{
        $minNumber = 100000000000;
        $maxNumber = 999999999999;
        return mt_rand($minNumber, $maxNumber);
    }
}
