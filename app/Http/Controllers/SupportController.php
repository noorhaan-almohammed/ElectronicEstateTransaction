<?php

namespace App\Http\Controllers;

use App\Mail\SupportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function sendSupportMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:30',
            'phone' => 'nullable|string|max:25',
            'message' => 'required|string|max:500',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        Mail::to('gnourhhaan1994@gmail.com')->send(new SupportMail($details));

        return redirect()->route('home')->with('success', 'تم إرسال رسالتك بنجاح!');
    }

}
