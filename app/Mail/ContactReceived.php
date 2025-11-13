<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $mail = $this->subject('New Contact Message from ' . ($this->contact->name ?? 'Unknown'))
                    ->markdown('emails.contact_received');

        // If the contact provided an email, set it as Reply-To so the recipient can reply directly
        if (!empty($this->contact->email)) {
            $mail->replyTo($this->contact->email, $this->contact->name ?? null);
        }

        return $mail;
    }
}
