<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Send
{
    public static function single_text($phone, $message)
    {
        $url = Server::api().'send-message';
        $data = [
            'phone' => $phone,
            'message' => $message,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_image(string $phone,$image,$caption=null)
    {
        $url = Server::api().'send-image';
        $data = [
            'phone' => $phone,
            'image' => $image,
            'caption' => $caption,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_audio(string $phone, $audio_url)
    {
        $url = Server::api().'send-audio';
        $data = [
            'phone' => $phone,
            'audio' => $audio_url,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_video(string $phone,$video_url,$caption= null)
    {
        $url = Server::api().'send-video';
        $data = [
            'phone' => $phone,
            'video' => $video_url,
            'caption' => $caption,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_document(string $phone,$document_url)
    {
        $url = Server::api().'send-document';
        $data = [
            'phone' => $phone,
            'document' => $document_url,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function again($id)
    {
        $url = Server::api()."resend-message?id=$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public static function multiple_text($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-message';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function multiple_image($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-image';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function multiple_video($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-video';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function multiple_audio($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-audio';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function multiple_document($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-document';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function footer_message($phone,$message,$footer,$header=null)
    {
        $payload = [
            "data" => [
                [
                    'phone' => $phone,
                    'message'=> [
                        'title' => [
                            'type' => 'text',
                            'content' => $header,
                        ],
                        'content' => $message,
                        'footer' => $footer,
                    ],
                ]
            ]
        ];
        $url = Server::api().'v2/send-template';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function template_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-template';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function list_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-list';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function location_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-location';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function button_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = Server::api().'v2/send-button';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public static function local_document($file,$phone)
    {
        $url = Server::api().'send-document-from-local';
        $filename = $file->getPathName();
        $handle = fopen($filename,"r");
        $data = fread($handle,filesize($filename));
        $name = $file->getClientOriginalName();
        $attachment = [
            'name' => $name
        ];
        $payload = [
            'phone' => $phone,
            'caption' => null,
            'file' => base64_encode($data),
            'data' => json_encode($attachment)
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

}

