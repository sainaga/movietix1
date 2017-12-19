<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpcomingEvent extends Mailable
{
    use Queueable, SerializesModels;

     public $user;
     public $auth;
     public $screening;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $auth, $screening)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->screening = $screening;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.upcomingevent');
    }
}
