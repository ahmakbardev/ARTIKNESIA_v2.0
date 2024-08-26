<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkir
{
    private string $key = '2f187fd20546b492f85a0654595a89d4';

    public function city()
    {
        return Http::withHeaders([
            'key' => $this->key,
        ])->get('https://api.rajaongkir.com/starter/city')->json();
    }

    public function cost($origin, $destination, $weight, $courier)
    {
        return Http::withHeaders([
            'key' => $this->key,
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin'      => (int)$origin,
            'destination' => (int)$destination,
            'weight'      => (int)$weight,
            'courier'     => $courier,
        ])->json();
    }
}
