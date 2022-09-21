# env

WABLAS_SERVER=solo*

WABLAS_TOKEN=xxxxxxxxx

*available server : solo,eu,pati,jogja,texas,kudus

# List Command

1. Device Info

    Device::info();

2. Send Single Message
    
    i. Send::single_text($phone*,$message);

    ii. Send::single_image_url($phone*,$image_url,$caption^);

    iii. Send::single_audio_url($phone*,$image_url);

    iv. Send::single_video_url($phone*,$image_url,$caption^);

    v. Send::single_document_url($phone*,$image_url);

    note : 
    ^ caption is optional
    ** you can use multiple phone separated by comma(,)
    
    Example :
    
        <?php
        ....
        
        use Silvanix/Wablas/Send;
        
        ....
        
        $phone = '6281393961320,0812615271212,0845121212';

        $message = 'hello';

        Send::single_text($phone,$message);

    vi. Send::footer_message($phone,$message,$footer,$header*);
    
        * header is optional

3. Resend Message

    Send::again($id);


4. Send Multiple Message

    i. Send::multiple_text($payload);
    
    * Example Format payload text
    
            $payload = [
                [
                    'phone' => '6281229889541',
                    'message' => 'Test Pesan 1',
                ],
                [
                    'phone' => '6281229889541',
                    'message' => 'Hello {name} Pesan with spintax',
                    'spintax' => true,
                    'source' => 'for personal'
                ],
                [
                    'phone' => '6285867765107',
                    'message' => 'Hello Pesan 3',
                    'secret' => true,
                ],
                [
                    'phone' => '6287817274185-1632192971',
                    'message' => 'Test Group',
                    'isGroup' => true,
                    'source' => 'group personal'
                ],
            ];
            
            
    ii. Send::multple_image_url($data);
    
    * Example Format payload text
   
               $payload = [
                    [
                        'phone' => '6281229889541',
                        'image' => 'https://cdn-asset.jawapos.com/wp-content/uploads/2019/01/keluarga-pawang-di-jepang-maafkan-macan-putih-yang-membunuhnya_m_.jpg',
                        'caption' => 'caption here',
                    ],
                    [
                        'phone' => '6287817274185-1632192971',
                        'image' => 'https://farm4.staticflickr.com/3075/3168662394_7d7103de7d_z_d.jpg',
                        'caption' => 'Image to group',
                        'isGroup' => true,
                    ],
                ];
        
    iii. Send::multiple_audio_url($data);
    
    * Example Format payload text
   
               $payload = [
                    [
                        'phone' => '6281229889541',
                        'audio' => 'https://prof3ssorst3v3.github.io/media-sample-files/jimmy-coffee.mp3',
                        'caption' => 'caption here',
                    ],
                    [
                        'phone' => '6287817274185-1632192971',
                        'audio' => 'https://prof3ssorst3v3.github.io/media-sample-files/jimmy-coffee.mp3',
                        'isGroup' => true,
                    ],
                ];
                
    iv. Send::multiple_video_url($data);
    
                $payload = [
                    [
                        'phone' => '6281229889541',
                        'video' => 'https://prof3ssorst3v3.github.io/media-sample-files/lion-sample.mp4',
                        'caption' => 'this caption optional',
                    ],
                    [
                        'phone' => '6287817274185-1632192971',
                        'video' => 'https://prof3ssorst3v3.github.io/media-sample-files/lion-sample.mp4',
                         'caption' => 'Image to group',
                        'isGroup' => true,
                    ],
                ];

    v. Send::multiple_document_url($data);
    
    vi.
    
    vii.
