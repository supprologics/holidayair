<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TourBooked extends Mailable
{
    use Queueable, SerializesModels;
    public $tour;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tour)
    {
        $this->tour=$tour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Tour Booked')->markdown('emails.bookedtour');
    }
}
