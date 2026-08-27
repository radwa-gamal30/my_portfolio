<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public function __construct(public array $data) {}
    public function build()
    {
        return $this->subject($this->data['subject']) ->replyTo($this->data['email'])->view('emails.contact');
    }
}
