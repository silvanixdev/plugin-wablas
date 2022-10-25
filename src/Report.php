<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Report
{
    use Server;

    public function real_time($data=null)
    {
        $id='';
        $page='';
        if(isset($data['message_id'])){
            $id = $data['message_id'];
        };
        if(isset($data['page'])){
            $page = $data['page'];
        };
        $url = self::api()."report-realtime?message_id=$id&page=$page";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }
}
