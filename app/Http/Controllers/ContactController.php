<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    // public function submitForm(Request $request)
    // {
    //     $formFields = $request->validate([

    //     ]);
    //     // Add your form submission logic here
    //     // For example, sending an email or saving to a database
    //     ContactUs::create($formFields);
    //     return redirect()->back()->with('success', 'Thank you for contacting us. One of our adivsers will take a look at your question and respond to you ASAP');
    // }
}
