<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Templates\Verify;
use App\Services\Sms;
use App\Services\Email;

class SendBothVerification
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {

      //Send Email
      $verificationEmail = Verify::boot($event->user);
      Email::sendHTML($event->user->email, $verificationEmail);

      //Send SMS
     $smsMessage = "Welcome to the ExpenseX platform! Your verification code is ".$event->user->verifyCode;
     Sms::send($event->user->phone, $smsMessage);
    }
}
