<?php

namespace Silvanix\Wablas;

trait Server
{
    protected $server;
    protected $token;

    function __construct()
    {
        $this->server = env('WABLAS_SERVER');
        $this->token =  env('WABLAS_TOKEN');
    }

    public function api()
    {
        $url = "https://$this->server.wablas.com/api/";
        return $url;
    }

    public function token()
    {
        return $this->token;
    }

    public function host()
    {
        $url = "https://$this->server.wablas.com";
        return $url;
    }
}
