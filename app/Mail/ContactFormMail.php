<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $fromName;
    public $fromEmail;
    public function __construct($data,$fromName, $fromEmail)
    {
        $this->data = $data;
        $this->fromName = $fromName;
        $this->fromEmail = $fromEmail;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->from($this->fromEmail, $this->fromName)
            ->subject('contact from Has Been Completed')
            ->view('emails.contact');
    }
}
