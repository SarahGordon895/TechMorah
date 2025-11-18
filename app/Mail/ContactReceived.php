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
    public $meta;

    /**
     * Create a new message instance.
     */
    public function __construct(Contact $contact, array $meta = [])
    {
        $this->contact = $contact;
        $this->meta = $meta;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $context = $this->meta['context'] ?? 'contact';
        $subject = $context === 'consult'
            ? 'New Consult Booking - ' . ($this->contact->name ?? 'Unknown')
            : 'New Contact Message from ' . ($this->contact->name ?? 'Unknown');

        $view = $context === 'consult'
            ? 'emails.contact_consult'
            : 'emails.contact_received';

        $mail = $this->subject($subject)
                    ->markdown($view, [
                        'contact' => $this->contact,
                        'meta' => $this->meta,
                    ]);

        // If the contact provided an email, set it as Reply-To so the recipient can reply directly
        if (!empty($this->contact->email)) {
            $mail->replyTo($this->contact->email, $this->contact->name ?? null);
        }

        return $mail;
    }
}
