<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Schedule
{
    use Server;

    public static function new_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/schedule';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);

        $json_data = $response->json();

        return $json_data;
    }

    public static function cancel($id)
    {
        $url = self::api()."schedule-cancel/$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->put($url);
        $json_data = $response->json();

        return $json_data;
    }

    public static function delete($id)
    {
        $url = self::api()."schedule/$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->delete($url);
        $json_data = $response->json();

        return $json_data;
    }

}
