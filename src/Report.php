<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Report
{
    use Server;

    public function real_time()
    {
        $url = self::api()."report-realtime";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }
}
