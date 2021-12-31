<?php

namespace App\Http\Controllers\payment\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    public function getAccessToken()
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl =curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
            )
        );
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }

    public function MakeHttp($url, $body)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                    CURLOPT_URL              => $url,
                    CURLOPT_HTTPHEADER => array('Content-Type:application/json', 'Authorization:Bearer '. $this->getAccessToken()),
                    CURLOPT_RETURNTRANSFER   => true,
                    CURLOPT_POST             =>  true,
                    CURLOPT_POSTFIELDS       => json_encode($body)
                )
            );

        $curl_response = curl_exec($curl);
        curl_close($curl);

        return $curl_response;
    }
}
