<?php

namespace App\Listeners;

use App\Events\ResetPassword;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Services\Sms;
use App\Services\Email;

class SendPasswordResetNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResetPassword  $event
     * @return void
     */
    public function handle(ResetPassword $event)
    {
      //Send SMS
      $smsMessage = "Hey ".$event->user->name." the code is  ".$event->user->verifyCode;
      Sms::send($event->user->phone, $smsMessage);

      //Send Email
      $message = "Hey ".$event->user->email . " </br>Seems you forgot your password. Your recovery password is ".$event->user->verifyCode;
      Email::send($event->user->email, $message);
    }
}
