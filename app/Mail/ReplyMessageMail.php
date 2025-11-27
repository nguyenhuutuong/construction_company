<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class ReplyMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $parentMessage;
    public $reply;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $parentMessage, Message $reply)
    {
        $this->parentMessage = $parentMessage;
        $this->reply = $reply;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Re: Your message to HTcons',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.reply-message',
            with: [
                'reply' => $this->reply,
                'parentMessage' => $this->parentMessage,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
