<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Contact
{
    use Server;

    public function create($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/create-contact';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }
}
