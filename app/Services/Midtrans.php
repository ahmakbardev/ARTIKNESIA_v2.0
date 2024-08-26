<?php

namespace App\Services;

class Midtrans
{
    public function getMidtransSnapUrl($params)
    {
        \Midtrans\Config::$serverKey    = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = (bool)env('MIDTRANS_PRODUCTION');
        \Midtrans\Config::$isSanitized  = (bool)env('MIDTRANS_SANITIZED');
        \Midtrans\Config::$is3ds        = (bool)env('MIDTRANS_3DS');

        return \Midtrans\Snap::createTransaction($params)->redirect_url;
    }
}
