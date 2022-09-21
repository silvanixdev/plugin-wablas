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
    
    * Example Format payload
    
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
    
    * Example Format payload
   
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
    
    * Example Format payload
   
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
    
     * Example Format payload
  
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
    
    * Example Format payload
    
                 $payload = [
                            [
                                'phone' => '6281229889541',
                                'document' => 'https://africau.edu/images/default/sample.pdf',
                            ],
                            [
                                'phone' => '6287817274185-1632192971',
                                'document' => 'https://africau.edu/images/default/sample.pdf',
                                'isGroup' => true,
                            ],
                        ];
    
    vi. Send::template_message($payload);
    
      * Example Format payload
        
               $payload = [
                    [
                       'phone' => '6285867765107',
                        'message'=> [
                            'title' => [
                                'type' => 'text',
                                'content' => 'template text',
                            ],
                            'buttons' => [
                                'url' => [
                                    'display' => 'wablas.com',
                                    'link' => 'https://wablas.com',
                                ],
                                'call' => [
                                    'display' => 'contact us',
                                    'phone' => '081223644xxx',
                                ],
                                'quickReply' => ["reply 1","reply 2"],
                            ],
                            'content' => 'sending template message...',
                            'footer' => 'footer template here',
                        ]
                    ]
                ];  
    
    vii. Send::list_message($payload);
    
     * Example Format payload
     
              $payload = [
                    [
                        'phone' => '6285867765107',
                        'message'=> [
                            'title' => 'Title Here',
                            'description' => 'This is template message',
                            'buttonText' => 'Opsi',
                            'lists' => [
                                [
                                    'title' => 'List 1',
                                    'description' => 'This is list 1',
                                ],
                                [
                                    'title' => 'List 2',
                                    'description' => 'This is list 2',
                                ],
                            ],
                            'footer' => 'Footer message here.',
                        ],
                    ]
                ];

    viii. Send::location_message($payload);
    
    * Example payload format

             $payload = [
                [
                    'phone' => '6285867765107',
                    'message' => [
                        'name' => 'place name',
                        'address' => 'street name',
                        'latitude' => 24.121231,
                        'longitude' => 55.1121221,
                    ],
                ]
            ];
    
    ix. Send::button_message($pauload);
    
    * Example payload format

          $payload = [
                [
                    'phone' => '6285867765107',
                    'message' => [
                        'buttons' => ["Reply 1","Reply 2","Reply 3"],
                        'content' => 'This is example button message',
                        'footer' => 'this is footer message',
                    ],
                ]
            ];
            
5. File Upload

    i. File::local_upload($file);
    
    Example :
    
    - Controller
    
                    ...

                    use Silvanix\Wablas\File;

                    ...

                        public function store(Request $request)
                        {
                            $file = $request->file('file');
                            $url = File::local_upload($file);
                            echo $url;
                        }
                        
    - Route
                
                ...
                
                Route::post('.../store', [App\Http\Controllers\SomeController::class, 'store'])->name('store');
                
                ...
                                
    - View
    
            ...
        
            <form class="needs-validation" novalidate method="post" action="{{ route('store') }}" enctype="multipart/form-data" >
            @csrf
                <input type="file" name="file">
                <button type="submit"> Submit</button>
            </form>
            
 6. Send Local Document
    
    i. Send::local_document($file,$phones);
    
    Example :
    
    - Controller
    
                    ...

                    use Silvanix\Wablas\Send;

                    ...

                        public function store(Request $request)
                        {
                            $phone = $request->phones;
                            $file = $request->file('file');
                            $text = Send::local_document($file,$phone);
                            echo $test;
                        }
                        
    - Route
                
                ...
                
                Route::post('.../store', [App\Http\Controllers\SomeController::class, 'store'])->name('store');
                
                ...
                                
    - View
    
            ...
        
            <form class="needs-validation" novalidate method="post" action="{{ route('store') }}" enctype="multipart/form-data" >
            @csrf
                <input type="text" placeholder="081393961320,0821212122,08128282812"name='phones'>
                <input type="file" name="file">
                <button type="submit"> Submit</button>
            </form>
