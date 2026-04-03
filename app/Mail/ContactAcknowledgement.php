<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactAcknowledgement extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Contact $contact,
        public array $meta = []
    ) {}

    public function build()
    {
        $context = $this->meta['context'] ?? 'contact';

        return $this->subject(
            $context === 'consult'
                ? 'We received your consult request — TechMorah'
                : 'We received your message — TechMorah'
        )->markdown('emails.contact_acknowledgement', [
            'contact' => $this->contact,
            'meta' => $this->meta,
        ]);
    }
}
