<?php

namespace Silvanix\Wablas;

class Server
{
    public static function api()
    {
        $server = env('WABLAS_SERVER');
        $url = "https://$server.wablas.com/api/";
        return $url;
    }

    public static function token()
    {
        return env('WABLAS_TOKEN');
    }

    public static function host()
    {
        $server = env('WABLAS_SERVER');
        $url = "https://$server.wablas.com";

        return $url;
    }
}
