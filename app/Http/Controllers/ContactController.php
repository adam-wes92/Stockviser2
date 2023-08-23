<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        // Add your form submission logic here
        // For example, sending an email or saving to a database

        return redirect()->route('contact.form')->with('success', 'Message sent successfully!');
    }
}
