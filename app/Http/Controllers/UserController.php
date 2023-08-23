<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {   // Form validation accordingly to the model
        $formFields = $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'birth_date' => ['required', 'date'],

            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone_number' => 'required',

            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zip' => 'required',

            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()]
        ]);

        // Encrypt the password in database table
        $formFields['password'] = bcrypt($formFields['password']);

        // Create a new user
        $user = User::create($formFields);

        auth()->login($user);

        // User logged in and... :
        return redirect('/')->with('message', 'User created and logged in');
    }

    // This is for the edit form 
    public function edit(User $user){
    return view('users.edit', ['user' => $user]);
    }

    // Update User Info
    public function update(Request $request, User $user) {
        // Now for some walidation, there is very minimal code we need to write:
        $formFields = $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required', 
            'birth_date' => 'required',
            'email' => ['required', 'email'],  
            'phone_number' => 'required',
            'address' => 'required', 
            'city' => 'required', 
            'zip' => 'required', 
            'password' => ['required', Password::min(6)->mixedCase()->numbers()->symbols()] // The password class is what we use to implement requirements for what the password should contain
        ]);
            
        // update() changes the data in the table for us
        $user->update($formFields);
        
        return redirect("/")->with('message', 'User Information updated');
    }


    public function logout(Request $request)
    {
        auth()->logout();

        //to remove the authentication info from the session additional requirement to invalidate their session and need to regenerate the user token
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'User logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate(); //generate new session
            return redirect('/companies.index')->with('message', 'User logged in');
        } else {
            // return redirect('/login')->with('message', '╰( ⁰ ਊ ⁰)━☆ﾟ☆ﾟ.*･｡ Fuck you. *･｡');
            return back()->withErrors(['email' => 'Wrong email or password', 'password' => 'Wrong email or password']);
        }
    }

    public function dashboard()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('users.dashboard', compact('user'));
    }
}
