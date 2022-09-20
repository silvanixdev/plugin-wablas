# env

WABLAS_SERVER=solo*

WABLAS_TOKEN=xxxxxxxxx

*available server : solo,eu,pati,jogja,texas,kudus

# List Command

1. Device Info

Device::info();

2. Send Single Message

Send::single_text($phone,$message);

Send::single_image_url($phone,$image_url,$caption(Optional));

Send::single_audio_url($phone,$image_url);

Send::single_video_url($phone,$image_url,$caption(Optional));

Send::single_document_url($phone,$image_url);


note : you can use multiple phone separated by comma(,)

Example :

use Silvanix/Wablas/Send;

$phone = '6281393961320,0812615271212,0845121212';

$message = 'hello';

Send::single_text($phone,$message);


3. Resend Message

Send::again($id);


4. Multiple Text

Send::multiple_text($data);

Send::multple_image_url($data);

Send::multiple_audio_url($data);

Send::multiple_video_url($data);

Send::multiple_document_url($data);

