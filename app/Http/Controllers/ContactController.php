<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name'=>'nullable|string|max:255',
            'email'=>'required|email',
            'phone'=>'nullable|string',
            'message'=>'required|string',
        ]);

        $contact = Contact::create($data);

    // send email to company owner (specified address)
    // NOTE: this will deliver emails to the configured mail transport. In local environments
    // you may need to configure a mail driver or use Mailhog / log driver to inspect messages.
    Mail::to('gordonsarah2404@gmail.com')->send(new ContactReceived($contact));

        // If the request expects JSON (AJAX), return JSON response so frontend can handle it cleanly.
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Message sent. We will contact you soon.']);
        }

        return redirect()->back()->with('success','Message sent. We will contact you soon.');
    }
}
