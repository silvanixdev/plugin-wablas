<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Schedule
{
   public static function new_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/schedule';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);

        $json_data = $response->json();

        return $json_data;
    }

    public static function cancel($id)
    {
        $url = Server::api()."schedule-cancel/$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->put($url);
        $json_data = $response->json();

        return $json_data;
    }

    public static function delete($id)
    {
        $url = Server::api()."schedule/$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->delete($url);
        $json_data = $response->json();

        return $json_data;
    }

}
