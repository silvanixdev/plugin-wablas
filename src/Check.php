<?php

namespace Silvanix\Wablas;

use Silvanix\Wablas\Server;
use Illuminate\Support\Facades\Http;

class Check
{
    use Server;

    public function phone($phones)
    {
        $url = "https://phone.wablas.com/check-phone-number?phones=$phones";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token(),
            'Url'=> self::host()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }
}
