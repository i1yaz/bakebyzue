<?php

namespace App\Mail;

use App\Models\Inquiry;
use App\Models\SiteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryAcknowledgement extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Inquiry $inquiry)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "We've received your sweet inquiry! - ZUE",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        return new Content(
            view: 'mail.inquiry-acknowledgement',
            with: [
                'settings' => $settings,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
