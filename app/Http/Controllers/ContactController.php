<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);

        $contact = new Contact($data);

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

        try {
            Mail::to('techmorahsolution@gmail.com')->send(new ContactReceived($contact));

            return $this->respond($request, [
                'success' => true,
                'message' => "✅ Message sent successfully! We'll be in touch soon.",
            ]);
        } catch (\Throwable $th) {
            Log::error('Failed to send contact email', [
                'exception' => $th,
                'payload' => $data,
            ]);

            return $this->respond($request, [
                'success' => false,
                'message' => '❌ Error sending message. Please try again later.',
            ], 500);
        }
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
