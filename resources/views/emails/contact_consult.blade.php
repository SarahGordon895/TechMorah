<x-mail::message>
# New Consult Booking

You have a new booking directly from the Services consult form.

---

**Name:** {{ $contact->name ?? '—' }}  
**Email:** {{ $contact->email }}  
**Phone:** {{ $contact->phone ?? '—' }}  
**Focus Area:** {{ $meta['focus'] ?? '—' }}

---

**Project Details:**

{{ $contact->message }}

---

<x-mail::button :url="url('/#consult')">
Review Services Page
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
