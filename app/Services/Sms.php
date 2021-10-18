<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
/**
 *
 */
class Sms
{

    public static function send($phone, $message)
    {
      
        $response = Http::retry(3, 1000)->asForm()->post(config('sms.kudisms.api_url'), [
            'username' => config('sms.kudisms.username'),
            'password' => config('sms.kudisms.password'),
            'message' => $message,
            'sender' => config('sms.kudisms.from'),
            'mobiles' => $phone,
        ]);
        return $response->body();

    }

}
