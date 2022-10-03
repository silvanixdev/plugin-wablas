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

    public static function disconnect()
    {
        $url = Server::api().'device/disconnect';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public static function restart()
    {
        $url = Server::api().'device/restart';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }
    
}
