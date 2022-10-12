<?php

namespace Silvanix\Wablas;

use Illuminate\Support\Facades\Http;
use Silvanix\Wablas\Server;

class Message
{
    use Server;

    public function single_text($phone, $message)
    {
        $url = self::api().'send-message';
        $data = [
            'phone' => $phone,
            'message' => $message,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function single_image(string $phone,$image,$caption=null)
    {
        $url = self::api().'send-image';
        $data = [
            'phone' => $phone,
            'image' => $image,
            'caption' => $caption,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function single_audio(string $phone, $audio_url)
    {
        $url = self::api().'send-audio';
        $data = [
            'phone' => $phone,
            'audio' => $audio_url,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function single_video(string $phone,$video_url,$caption= null)
    {
        $url = self::api().'send-video';
        $data = [
            'phone' => $phone,
            'video' => $video_url,
            'caption' => $caption,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function single_document(string $phone,$document_url)
    {
        $url = self::api().'send-document';
        $data = [
            'phone' => $phone,
            'document' => $document_url,
            'spintax' => true
        ];
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$data);
        $json_data = $response->json();

        return $json_data;
    }

    public function again($id)
    {
        $url = self::api()."resend-message?id=$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public function multiple_text($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-message';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function multiple_image($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-image';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function multiple_video($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-video';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function multiple_audio($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-audio';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function multiple_document($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-document';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function footer_message($phone,$message,$footer,$header=null)
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
        $url = self::api().'v2/send-template';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function template_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-template';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function list_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-list';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function location_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-location';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function button_message($data)
    {
        $payload = [ 'data'=> $data];
        $url = self::api().'v2/send-button';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function local_document($file,$phone)
    {
        $url = self::api().'send-document-from-local';
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
            'Authorization'=> self::token()
        ])->post($url,$payload);
        $json_data = $response->json();

        return $json_data;
    }

    public function local_file($file,$phone,$caption=null)
    {
        $type = File::check_ext($file);

        if($type === null)
        {
            return 'invalid file';
        }

        $url = self::api()."send-$type-from-local";
        $token = self::token();
        $rawData = $file->getPathName();
        $mime = $file->getMimeType();
        $name = $file->getClientOriginalName();

        $data = new \CURLFile($rawData,$mime,$name);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('file'=>$data,'phone'=>$phone,'caption'=>$caption));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($result);

        return $json;
    }

    public function cancel($id)
    {
        $url = self::api()."cancel-message?id=$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public function cancel_all()
    {
        $url = self::api().'cancel-all-message';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

    public function revoke($id)
    {
        $url = self::api()."revoke-message?id=$id";
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization'=> self::token()
        ])->get($url);
        $json_data = $response->json();

        return $json_data;
    }

}

