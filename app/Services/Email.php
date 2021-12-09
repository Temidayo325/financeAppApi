<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
/**
 *
 */
class Email
{

    public static function addToList($list_name, $email)
    {
        $response = Http::asForm()->post(config('elastic.mail.list_url'), [
            'publicAccountID' => config('elastic.mail.public_id'),
            'email' => $email,
            'listName' => $list_name,
            'sendActivation' => false,
        ]);
        return $response->body();
    }

    public static function send($email, $message)
    {
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'subject' => 'Welcome to ExpenseX',
                  'bodyText' => $message,
                  'from' => config('elastic.mail.from'),
                  'fromName' => 'Kelvin from ExpenseX',
                  'to' => $email,
      ]);
      return $response->body();

    }

    public static function sendHTML($email, $htmlMessage)
    {
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'subject' => 'Welcome to ExpenseX',
                  'bodyHtml' => $htmlMessage,
                  'from' => 'Opeyemi@lumina.com.ng',
                  'fromName' => 'Kelvin from ExpenseX',
                  'to' => $email,
      ]);
      return $response->body();

    }

    public static function sendTemplate($email, $template)
    {
      $response = Http::retry(3, 1000)->asForm()->post(config('elastic.mail.send_url'), [
                  'apikey' => config('elastic.mail.api_key'),
                  'subject' => 'Welcome to ExpenseX',
                  'template' => $template,
                  'from' => config('elastic.mail.from'),
                  'fromName' => 'Kelvin from ExpenseX',
                  'to' => $email,
      ]);
      return $response->body();
   }
}
