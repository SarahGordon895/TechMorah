<x-mail::message>
# Thank you, {{ $contact->name ?? 'there' }}

We’ve received your {{ ($meta['context'] ?? 'contact') === 'consult' ? 'consultation request' : 'message' }} and will reply as soon as we can.

@if(!empty($meta['focus']))
**Topic:** {{ $meta['focus'] }}

@endif
**Your message:**

{{ $contact->message }}

---

**Need something faster?**  
WhatsApp: [+255 655 139 724](https://wa.me/255655139724)  
Email: techmorahsolution@gmail.com

<x-mail::button :url="route('home')">
Visit TechMorah
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
