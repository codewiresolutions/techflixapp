<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrdercreationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $fromName;
    public $fromEmail; // Add the fromEmail property

    public function __construct($order, $fromName, $fromEmail)
    {
        $this->order = $order;
        $this->fromName = $fromName;
        $this->fromEmail = $fromEmail; // Initialize the fromEmail property
    }

    public function build()
    {
        return $this->from($this->fromEmail, $this->fromName)
            ->subject('New Order Has Been Generated')
            ->view('admin.pages.emails.order-created-email');
    }
}
