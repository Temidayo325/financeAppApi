<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistered
{
    use Dispatchable, SerializesModels;

    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
   public function __construct($user)
    {
        $this->user = $user;
    }

}
