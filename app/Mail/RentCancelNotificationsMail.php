<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RentCancelNotificationsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rentDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rentDetails)
    {
        $this->rentDetails = $rentDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Rent Cancellation Notification')
                    ->view('emails.rentCancelNotification');
    }
}