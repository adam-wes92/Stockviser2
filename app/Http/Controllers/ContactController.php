<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contactForm');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'ticker' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $name = $formFields['name'];
        $email = $formFields['email'];
        $ticker = $formFields['ticker'];
        $subject = $formFields['subject'];
        $message = $formFields['message'];

        $mailData = [
            'name' => $name,
            'email' => $email,
            'ticker' => $ticker,
            'subject' => $subject,
            'message' => $message,
        ];

        if (empty($errors)) {
            Mail::to('lccockrum92@gmail.com')->send(new ContactMail($name, $email, $ticker, $subject, $message));
        } else {
        Contact::create($formFields);

        return redirect()->back()->with(['success' => 'Thank you for contacting us. Our advisers will review your message and will get back to you ASAP.']);
    }

    }
    }

