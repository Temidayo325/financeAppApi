<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Services\Sms;
use App\Services\Email;

class SendWelcomeNotification
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
         //Add to email
         Email::addToList('ExpenseX', $event->user->email);

         //Send Email
         Email::sendTemplate($event->user->email, "welcome to expenseX");

         //Send SMS
        $smsMessage = "Welcome to the ExpenseX platform! Your verification code is ".$event->user->verifyCode;
        Sms::send($event->user->phone, $smsMessage);
    }
}
