<?php

namespace Silvanix\Wablas;

use Silvanix\Wablas\Server;
use Illuminate\Support\Facades\Http;

class Device
{
    public static function info()
    {
        $url = Server::api()."device/info?token=".Server::token();
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }
}
