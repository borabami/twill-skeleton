<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormRequest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $mail_settings;
    private $form_data;

    /**
     * Create a new message instance.
     */
    public function __construct($mail_settings, $form_data)
    {
        //
        $this->mail_settings = $mail_settings;
        $this->form_data = $form_data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            from: new Address(config('mail.from.address')),
            subject: $this->mail_settings['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact-request',
            with: [
                'form_data' => $this->form_data,
            ],
        );
    }
}
