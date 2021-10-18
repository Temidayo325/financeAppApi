<?php

return [

    'mail' => [
        'api_key' => env('ELASTIC_MAIL_API_KEY'),
        'list_url' => env('ELASTIC_MAIL_LIST_API_URL'),
        'send_url' => env('ELASTIC_MAIL_SEND_API_URL'),
        'from' => env('ELASTIC_MAIL_FROM'),
        'public_id' => env('ELASTIC_MAIL_PUBLIC_ID'),
    ]

];
