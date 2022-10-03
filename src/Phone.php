<?php

namespace Silvanix\Wablas;

use Silvanix\Wablas\Server;
use Illuminate\Support\Facades\Http;

class Phone
{
    public static function check($phones)
    {
        $url = "https://phone.wablas.com/check-phone-number?phones=$phones";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token(),
            'Url'=> Server::host()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;

    }
}
