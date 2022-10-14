<?php

namespace Silvanix\Wablas;

use Silvanix\Wablas\Server;

class File
{
    use Server;

    public function local_upload($file)
    {
        $type = self::check_ext($file);
        if($type === null)
        {
            return 'invalid file';
        }

        $token = self::token();
        $rawData = $file->getPathName();
        $mime = $file->getMimeType();
        $name = $file->getClientOriginalName();

        $url = self::api()."upload/$type";
        $data = new \CURLFile($rawData,$mime,$name);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('file'=>$data));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($result);
        if ($json->status === true)
        {
            return $json->data->url;
        }
        return $json;
    }

    public static function check_ext($file)
    {
        $ext = $file->getClientOriginalExtension();
        $image = ['jpg', 'jpeg', 'png', 'PNG', 'JPEG', 'JPG'];
        $document = ['doc', 'docx', 'pdf', 'odt', 'csv', 'ppt', 'zip', 'ZIP', 'pptx', 'xls', 'xlsx', 'ogg', 'DOC', 'DOCX', 'RAR', 'rar', '7z', 'PDF', '7Z', 'CSV', 'PPT', 'PPTX', 'XLS', 'XLSX', 'txt'];
        $video = ['mp4', 'mpeg', 'gif', 'MP4', 'GIF', 'MPEG'];
        $audio = ['mp3', 'ogg', 'mpga', 'MP3', 'OGG', 'MPGA'];

        if(in_array($ext, $image, true))
        {
            return 'image';
        }
        else if(in_array($ext, $video, true))
        {
            return 'video';
        }
        else if(in_array($ext, $audio, true))
        {
            return 'audio';
        }
        else if(in_array($ext, $document, true))
        {
            return 'document';
        }

        return null;
    }
}
