<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Application $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope()
    {
        return new Envelope(
//            from: new Address('jeffrey@example.com', 'Jeffrey Way'),
            subject: 'Application Created',
        );
    }

    public function content()
    {
        return new Content(
            html: 'emails.application-created',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        if (! is_null($this->application->file_url)) {
            return [Attachment::fromStorageDisk('public', $this->application->file_url)];
        }
        return [];
    }
}
