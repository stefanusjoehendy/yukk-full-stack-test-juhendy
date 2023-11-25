<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Enquiry_Sales_Admin extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Enquiry Sales',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.enquiry_sales_admin',
            html    : 'vendor.mail.html.message',
            with    : [
                'name'                  => $this->data['name'],
                'email'                 => $this->data['email'],
                'title'                 => $this->data['title'],
                'event_code'            => $this->data['event_code'],
                'event_date'            => $this->data['event_date'],
                'event_time'            => $this->data['event_time'],
                'phone'                 => $this->data['phone'],
                'budget'                => $this->data['budget'],
                'total_pax'             => $this->data['total_pax'],
                'special_request'       => $this->data['special_request'],
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
