# Official Package Wablas.com

Ini merupakan package yang dikembangkan oleh [Wablas.com](https://wablas.com), 
untuk mempermudah dalam melakukan implementasikan fitur-fitur yang dimiliki oleh [Wablas.com](https://wablas.com).

## Fitur

* Info Device
* Send Text Message
* Send Media Message (Image, Video, Audio, Document)
* Send Button Message
* Send Footer Message
* Send Template Message
* Send Location Message
* Send List Message
* Send Document From Local Upload
* Resend Message by ID
* Upload File
* Schedule Message
* Cancel Schedule by ID
* Delete Schedule by ID

## Peringatan

```
Aplikasi ini gratis dan open source dan boleh digunakan siapa saja tanpa dikenai biaya apapun.
Hal yang tidak boleh dilakukan adalah memperjualbelikan/mengambil keuntungan dari aplikasi ini dalam bentuk apapun tanpa seijin pembuat software (PT. Manunggal Teknologi Indonesia).
Bagi yang dengan sengaja memperjualbelikan/mengambil keuntungan dari aplikasi ini, kami sumpahi sial dan melarat 1.000.000 turunan.
Karena kami tidak rela karya kami dibajak tanpa ijin.
```

## Tahapan Instalasi

```bash
# Tambahkan di file .env 
# Token bisa didapatkan di wablass.com pada menu device - setting
$ WABLAS_TOKEN=

# tentukan dimana akun anda terdaftar diwablas.com. saat ini server yang ada di wablas adalah: solo, pati, kudus, jogja, texas dan eu.
$ WABLAS_SERVER=

```

# Documentation

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
    
    * you can use multiple phone separated by comma(,)
    
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
    
    ix. Send::button_message($payload);
    
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
                            $phones = $request->phones;
                            $file = $request->file('file');
                            $test = Send::local_document($file,$phones);
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
            
 7. Schedule Message
 
    i. Schedule::new_message($payload);
    
    * Example payload
    
        -Simple Text Message
        
            $payload = [
                [
                    'category' => 'text',
                    'phone' => '6285867765107',
                    'scheduled_at' => '2022-09-22 09:46:30',
                    'text' => 'Hallo kakak',
                ]
            ];
            
        -Multiple Category Message
        
            $payload = [
                [
                    'category' => 'image',
                    'phone' => '62812185122343',
                    'scheduled_at' => '2022-05-20 13:20:00',
                    'text' => 'Cover Novel',
                    'url' => ' https://solo.wablas.com/image/20220315081917.jpeg',
                ],
                [
                    'category' => 'template',
                    'phone' => '6281218567323',
                    'scheduled_at' => '2022-05-20 13:20:00',
                    'text' => [
                        'title' => [
                            'type' => 'image',
                            'content' => 'https://cdn-asset.jawapos.com/wp-content/uploads/2019/01/keluarga-pawang-di-jepang-maafkan-macan-putih-yang-membunuhnya_m_.jpg',
                        ],
                        'buttons' => [
                            'url' => [
                                'display' => 'wablas.com',
                                'link' => 'https://wablas.com',
                            ],
                            'call' => [
                                'display' => 'contact us',
                                'link' => '081223644660',
                            ],
                            'quickReply' => ["reply 1","reply 2"],
                        ],
                        'content' => 'sending template message...',
                        'footer' => 'footer template here',
                    ],
                ],
                [
                    'category' => 'button',
                    'phone' => '62812112121212',
                    'scheduled_at' => '2022-05-20 13:20:00',
                    'text' => [
                        'buttons' => ["button 1","button 2","button 3"],
                        'content' => 'sending template message...',
                        'footer' => 'footer template here',
                    ],
                ],
            ];  

    ii. Schedule::cancel($id);
    
    iii. Schedule::delete($id);
    
## License

[Aladdin Free Public License](https://en.wikipedia.org/wiki/Aladdin_Free_Public_License)

## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :)

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=muh.yanun%40gmail%2ecom&lc=ID&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted)
