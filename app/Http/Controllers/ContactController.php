<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReceived;
use App\Mail\ContactAcknowledgement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Arr;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'focus' => 'nullable|string|max:255',
            'source' => 'nullable|string|in:contact,consultation',
            'message' => 'required|string',
        ]);

        $contact = new Contact(Arr::only($data, ['name', 'email', 'phone', 'message']));

        // Try to persist only if the contacts table exists (avoid SQL errors on fresh setups)
        try {
            if (Schema::hasTable($contact->getTable())) {
                $contact->save();
            }
        } catch (\Throwable $dbException) {
            Log::warning('Unable to persist contact submission, continuing with email only.', [
                'exception' => $dbException,
                'payload'   => $data,
            ]);
        }

        $context = $data['source'] === 'consultation' ? 'consult' : 'contact';
        $meta = [
            'context' => $context,
            'focus' => $data['focus'] ?? null,
        ];

        $inbox = config('mail.contact.address') ?: config('mail.from.address');

        try {
            Mail::to($inbox)->send(new ContactReceived($contact, $meta));
        } catch (\Throwable $th) {
            Log::error('Failed to send contact notification to team', [
                'exception' => $th,
                'payload' => $data,
            ]);

            return $this->respond($request, [
                'success' => false,
                'message' => '❌ Error sending message. Please try again later.',
            ], 500);
        }

        try {
            Mail::to($contact->email)->send(new ContactAcknowledgement($contact, $meta));
        } catch (\Throwable $th) {
            Log::warning('Contact saved but acknowledgement email failed', [
                'exception' => $th,
                'email' => $contact->email,
            ]);
        }

        return $this->respond($request, [
            'success' => true,
            'message' => "✅ Message sent successfully! We'll be in touch soon. Check your inbox for a copy.",
        ]);
    }

    protected function respond(Request $request, array $payload, int $status = 200)
    {
        if ($request->expectsJson() || $request->isJson() || $request->ajax()) {
            return response()->json($payload, $status);
        }

        $flashKey = $payload['success'] ? 'success' : 'error';

        return redirect()->back()->with($flashKey, $payload['message']);
    }
}
