<x-mail::message>
# New Contact Message

You’ve received a new message from your website contact form.

---

**Name:** {{ $contact->name ?? '—' }}  
**Email:** {{ $contact->email }}  
**Phone:** {{ $contact->phone ?? '—' }}

---

**Message:**

{{ $contact->message }}

---

<x-mail::button :url="url('/')">
View Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
