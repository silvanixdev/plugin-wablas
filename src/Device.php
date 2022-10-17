<?php

namespace Silvanix\Wablas;

use Silvanix\Wablas\Server;
use Illuminate\Support\Facades\Http;

class Device
{
    use Server;

    public function info()
    {
        $url = self::api()."device/info?token=".self::token();
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public function disconnect()
    {
        $url = self::api().'device/disconnect';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public function restart()
    {
        $url = self::api().'device/restart';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public function set_webhook($url)
    {
        $url = self::api().'device/change-webhook-url';
        $data = [
            'webhook_url' => $url
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function set_tracking($url)
    {
        $url = self::api().'device/change-tracking-url';
        $data = [
            'tracking_url' => $url
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function incoming($set)
    {
        $url = self::api().'device/incoming';
        $data = [
            'incoming' => $set
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

}
