<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Public variable to hold the email address

    /**
     * Create a new message instance.
     *
     * 
     */
    public function __construct($user)
    {
        $this->user = $user; // Assign the email to the variable
    }

    /**
     * Build the message.
     *
     * $this
     */
    public function build()
    {
        return $this->subject('New Admin Registration')
                    ->view('emails.admin_registered'); // Ensure this view exists
    }
}
