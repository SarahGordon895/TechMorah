<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        $data = $request->validate([
            'to' => 'required',
            'message' => 'required|string',
        ]);

        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_FROM');

        $client = new Client($sid, $token);
        $message = $client->messages->create($data['to'], [
            'from' => $from,
            'body' => $data['message'],
        ]);

        return response()->json(['sid'=>$message->sid]);
    }
}
