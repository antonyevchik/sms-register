<?php

return [
    'inforu' => [
        'service_enabled' => env('INFORU_ENABLED', false),
        'xml_endpoint' => env('INFORU_XML_ENDPOINT'),
        'login' => env('INFORU_LOGIN'),
        'api_token' => env('INFORU_API_TOKEN'),
        'sender_name' => env('INFORU_SENDER_NAME'),
        'email_endpoint' => env('INFORU_EMAIL_ENDPOINT'),
        'from_address'  => env('INFORU_FROM_ADDRESS')
    ]
];
