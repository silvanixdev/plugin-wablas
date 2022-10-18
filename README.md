# Official Package Wablas.com

Ini merupakan package yang dikembangkan oleh [Wablas.com](https://wablas.com), 
untuk mempermudah dalam melakukan implementasikan fitur-fitur yang dimiliki oleh [Wablas.com](https://wablas.com).

## Fitur

* Info Device
* Restart Device
* Disconnect Device
* Check Phone
* Send Text Message
* Send Media Message (Image, Video, Audio, Document)
* Send Button Message
* Send Footer Message
* Send Template Message
* Send Location Message
* Send List Message
* Send Document From Local Upload (PDF, Words Files, Excel Files, PPT)
* Send File From Local (Image, Video, Audio)
* Resend Message by ID
* Upload File
* Schedule Message
* Cancel Schedule by ID
* Delete Schedule by ID
* Cancel Pending Message by ID
* Cancel All Pending Message
* Revoke Message
* Report Send Message

## Peringatan

```
Aplikasi ini gratis dan open source dan boleh digunakan siapa saja tanpa dikenai biaya apapun.
Hal yang tidak boleh dilakukan adalah memperjualbelikan/mengambil keuntungan dari aplikasi ini dalam bentuk apapun tanpa seijin pembuat software (PT. Manunggal Teknologi Indonesia).
Bagi yang dengan sengaja memperjualbelikan/mengambil keuntungan dari aplikasi ini, kami sumpahi sial dan melarat 1.000.000 turunan.
Karena kami tidak rela karya kami dibajak tanpa ijin.
```

## Tahapan Instalasi
```bash
composer require silvanix/wablas
```

Enviroment

```bash
# Tambahkan di file .env 
# Token bisa didapatkan di wablass.com pada menu device - setting
WABLAS_TOKEN=

# tentukan dimana akun anda terdaftar diwablas.com. saat ini server yang ada di wablas adalah: solo, pati, kudus, jogja, texas dan eu.
WABLAS_SERVER=

```

## Device

  1. info();

  2. restart();

  3. disconnect();
  
  4. set_webhook($url);
  
  5. set_tracking($url);
  
  6. incoming($status);

  Example :
  ```PHP
        use Silvanix/Wablas/Device;

        $device = new Device();

        $info = $device->info();
        $restart = $device->restart();
        $disconnect = $device->disconnect();
        
        $url = 'https://www.mywebhook.com/webhook';
        $set = $device->set_webhook($url);
        
        $incoming = $device->incoming('active');
        //for now anything than 'active' = incoming message disable
  ```
  
## Check

  use this to check Whatsapp Number is active or not

  1. phone($phones);

      - you can use multiple phone separated by comma(,)

        Example :
  ```PHP
        use Silvanix/Wablas/Check;

        $check = new Check();

        $phones ='08121211111,089888888,07812121212';
        $check_phone = $check->phone($phones);

  ```
  
## Message
  1. Single Message 
  
      - single_text($phone,$message);

      - single_image($phone,$image_url,$caption);

      - single_audio($phone,$audio_url);

      - single_video($phone,$video_url,$caption);

      - single_document($phone,$document_url);

      - footer_message($phone,$message,$footer,$header);

        - $caption is optional
        - you can use multiple phone separated by comma(,)
        - header is optional

        Example :

   ```PHP
        use Silvanix/Wablas/Message;

        $send = new Message();

        $phones ='08121211111,089888888,07812121212';
        $message = 'hello';
        $image = 'https://i.imgur.com/OB0y6MR.jpg';

        $send_text = $send->single_text($phones,$message);
        $send_image =  $send->single_image($phones,$image,$message);

  ```

  2. Resend Message , Cancel & Revoke

      - again($id);
      
        resend canceled message
        
      - cancel($id);
       
        cancel pending message by ID
        
      - cancel_all();
        
        cancel all pending messages
        
      - revoke($id);
       
        cancel pending message by ID
        
         - you can use multiple phone separated by comma(,)
         
        Example :
  
  ```PHP
        use Silvanix/Wablas/Message;

        $send = new Message();

        $message_id ='sakdj798-lkasjndl-k8792173kjas';
        
        $resend = $send->again($message_id);
        $cancel = $send->cancel($message_id);
        $cancel_all = $send->cancel_all();
        $revoke = $send->revoke($message_id);
  
  ```

  . Send Multiple Message

      - multiple_text($payload);
  ```PHP
        use Silvanix/Wablas/Message;

        $send = new Message();

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
      $send_text = $send->multiple_text($payload);
  
 ```
      
   - multiple_image($payload);
    
 ```PHP
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
 ```
  
   - multiple_audio($payload);
   
 ```PHP
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
 ```
            
                
   - multiple_video($payload);
   
 ```PHP
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
 ```
               
   - multiple_document($payload);
   
```PHP
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
      
```
                
    
   - template_message($payload);
   
   ```PHP
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
      
   ```
              
    
   - list_message($payload);
   
   ```PHP
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
      
    ```
             
   - location_message($payload);
    
   ```PHP
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
      
  ```
            
   - button_message($payload);
    
```PHP
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
      
```
        
4. File Upload

    - local_upload($file);
    
    Example :
    
    - Controller
    
    ```PHP
        use Silvanix\Wablas\File;
        public function store(Request $request)
        {
            $file = $request->file('file');
            $upload = new File();
            $url = $upload->local_upload($file);
            echo $url;
        }
      ```
      - Route 
    ```PHP
      ...
        Route::post('.../store', [App\Http\Controllers\SomeController::class, 'store'])->name('store');
      ```
 - View
    
  ```Html
        <form class="needs-validation" novalidate method="post" action="{{ route('store') }}" enctype="multipart/form-data" >
         @csrf
            <input type="file" name="file">
            <button type="submit"> Submit</button>
        </form>
      
 ```
            
 5. Send Local Document
    
    - local_document($file,$phones);
    
    Example :
    
    - Controller
    
     ```PHP
      use Silvanix\Wablas\Message;
      
      public function store(Request $request)
      {
          $phones = $request->phones;
          $file = $request->file('file');
          $send = new Message();
          $test = $send->local_document($file,$phones);
          echo $test;
      }
      ```
      
    - Route
    
      ```PHP
      ...
      Route::post('.../store', [App\Http\Controllers\SomeController::class, 'store'])->name('store');
      
      ```    
      
    - View
    
     ```Html
      <form class="needs-validation" novalidate method="post" action="{{ route('store') }}" enctype="multipart/form-data" >
      @csrf
          <input type="text" placeholder="081393961320,0821212122,08128282812"name='phones'>
          <input type="file" name="file">
          <button type="submit"> Submit</button>
      </form>

      ```
            
 6. Schedule Message
 
    - new_message($payload);
    
      Example :
        ```PHP
      use Silvanix\Wablas\Schedule;
           
          $payload = [
              [
                  'category' => 'text',
                  'phone' => '6285867765107',
                  'scheduled_at' => '2022-09-22 09:46:30',
                  'text' => 'Hallo kakak',
              ]
          ];
          
          $shedule = new Schedule();
          $create = $schedule->new_message($payload);
  
        ```
           
    - Multiple Category
    
       ```PHP
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
                            'content' => 'https://farm4.staticflickr.com/3075/3168662394_7d7103de7d_z_d.jpg',
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
  
        ```
        
    - cancel($id);
      
    - delete($id);
      
      Example :
         ```PHP
          use Silvanix\Wablas\Schedule;
          
          $shedule = new Schedule();
          
          $id = 'kajbdiuwe-8723yjhasbds-asdknasd8y';
          $cancel = $schedule->cancel($id);
          $delete = $schedule->delete($id);
  
        ```
 7. Send Local File (Image, Audio, Video)
    
    - local_file($file,$phones,$caption);
    
    Example :
    
    - Controller
      ```PHP
        use Silvanix\Wablas\Message;

        public function store(Request $request)
        {
            $phones = $request->phones;
            $caption = $request->caption;
            $file = $request->file('file');
            $send = new Message();
            $test = $send->local_file($file,$phones,$phone);
            echo $test;
        }
  
        ```
                        
    - Route
         
      ```PHP
      ...
      Route::post('.../store', [App\Http\Controllers\SomeController::class, 'store'])->name('store');
      
      ```            
                                
    - View
      ```Html
        <form class="needs-validation" novalidate method="post" action="{{ route('store') }}" enctype="multipart/form-data" >
          @csrf
              <input type="text" placeholder="081393961320,0821212122,08128282812"name='phones'>
              <input type="text" name="caption">
              <input type="file" name="file">
              <button type="submit"> Submit</button>
          </form>

      ```
      
  7. Report
    
      - real_time();

        Get Report of 1000 Send Messages Today.
      
        Example :
    
          ```PHP
          use Silvanix\Wablas\Report;

          $report = new Report();
          $get_report = $report->real_time();
          echo $get_report;
  
          ```
## License

[Aladdin Free Public License](https://en.wikipedia.org/wiki/Aladdin_Free_Public_License)

## Donation

If this project help you reduce time to develop, you can give me a cup of coffee :)

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=muh.yanun%40gmail%2ecom&lc=ID&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted)
