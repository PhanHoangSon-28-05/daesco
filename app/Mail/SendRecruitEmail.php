<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRecruitEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $file;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $file)
    {
        $this->data = $data;
        $this->file = $file;
        // dd($data);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Recruit Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.recruit-email',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if (!$this->file) return [];

        $file = $this->file;
        $filepath = $file->getRealPath();
        $filename = $file->getClientOriginalName();
        return [Attachment::fromPath($filepath)->as($filename)];
    }
}
