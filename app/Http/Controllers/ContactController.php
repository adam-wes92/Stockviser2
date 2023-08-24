<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    //You need to adjust the .env file
    /*
To create a contact form in Laravel that sends an email when the submit button is pressed, you'll need to follow a series of steps. Here's a high-level overview:

Set up Laravel:
If you haven't already, make sure you have Laravel installed and set up a Laravel project.

Configure Your Email Settings:
In your Laravel project, open the .env file. You'll need to configure your email settings. Here are the relevant variables you should configure:

env
Copy code
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host.com
MAIL_PORT=587
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
Replace the placeholders (your-smtp-host.com, your-smtp-username, your-smtp-password) with your actual SMTP server details. You can use services like Gmail or Mailgun for sending emails. The MAIL_MAILER variable specifies the mail driver (in this case, SMTP).

Create the Contact Form:
Create a form in your Laravel application's Blade template where users can enter their contact information and message. The form should have a POST action that sends the form data to a specific route.

Create a Route:
Define a route in the routes/web.php file to handle the form submission. For example:

php
Copy code
Route::post('/contact', 'ContactController@sendEmail')->name('contact.send');
Create a Controller:
Create a controller (e.g., ContactController) using the php artisan make:controller command. In this controller, you'll define the logic for sending the email.

Write the Logic to Send Email:
In the ContactController, create a method (e.g., sendEmail) that handles the form submission and sends the email. You'll use Laravel's built-in Mail class to send emails. Here's a simplified example:

php
Copy code
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

// ...

public function sendEmail(Request $request)
{
    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
    ];

    Mail::to('recipient@example.com')->send(new ContactFormMail($data));

    return redirect()->route('contact.send')->with('success', 'Message sent successfully!');
}
In this example, ContactFormMail is a Mailable class that you need to create to format the email content.

Create a Mailable:
Generate a Mailable class using the php artisan make:mail command. This class will define how your email looks. Customize the build method in this class to format your email.

php
Copy code
public function build()
{
    return $this->view('emails.contact')->with(['data' => $this->data]);
}
In this example, the email view is expected to be located at resources/views/emails/contact.blade.php.

Create the Email View:
Create the email view file at resources/views/emails/contact.blade.php. Customize this view to display the contact information and message.

Display a Confirmation Message:
In your contact form Blade template, display a confirmation message to the user after the form is submitted.

Test the Contact Form:
Test the contact form by submitting it. If everything is configured correctly, you should receive an email at the specified recipient address.

Remember to configure any necessary email services, such as SMTP, in your server environment to ensure that emails can be sent successfully. Additionally, you may need to set up mail-related services like queues and drivers, depending on your project's requirements.
    */

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
