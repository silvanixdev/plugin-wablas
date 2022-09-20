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
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_image_url(string $phone,$image,$caption=null)
    {
        $url = Server::api().'send-image';
        $data = [
            'phone' => $phone,
            'image' => $image,
            'caption' => $caption,
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_audio_url(string $phone, $audio_url)
    {
        $url = Server::api().'send-audio';
        $data = [
            'phone' => $phone,
            'audio' => $audio_url,
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_video_url(string $phone,$video_url,$caption= null)
    {
        $url = Server::api().'send-video';
        $data = [
            'phone' => $phone,
            'video' => $video_url,
            'caption' => $caption,
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> Server::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public static function single_document_url(string $phone,$document_url)
    {
        $url = Server::api().'send-document';
        $data = [
            'phone' => $phone,
            'document' => $document_url,
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

    public static function multiple_image_url($data)
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

    public static function multiple_video_url($data)
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

    public static function multiple_audio_url($data)
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

    public static function multiple_document_url($data)
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
}

