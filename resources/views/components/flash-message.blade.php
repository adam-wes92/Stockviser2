{{-- session() is the helper that gives access to the $_SESSION
    It also provides useful functions like has() --}}
@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
{{-- @if (session()->has('message'))
This line checks if a session variable named 'message' exists. session() is a Laravel helper function that provides access to session data. The has() method is used to determine if the specified session key exists.

<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x1/2 bg-laravel text-white px-48 py-3">
This <div> element has some special attributes prefixed with x-. These attributes are part of the Alpine.js library, which is a minimal JavaScript framework used for adding interactivity to web applications. Here's what each attribute does:

x-data="{ show: true }":
This initializes an Alpine.js data object with a property named show set to true. This property will control the visibility of the <div>.

x-init="setTimeout(() => show = false, 3000)":
The x-init attribute is used to execute a JavaScript snippet when the element is initialized. In this case, it sets a timeout using setTimeout() to change the show property to false after 3000 milliseconds (3 seconds). This will trigger the animation to hide the <div> after the specified time.

x-show="show":
This attribute binds the show property from the Alpine.js data object to the visibility of the <div>. When show is true, the <div> is displayed; when show is false, the <div> is hidden.


<p>{{ session('message') }}</p>
This line displays the content of the 'message' session variable inside a <p> element. The session() function is used to retrieve the value of the session variable.

In summary, this code snippet creates a message notification <div> that appears at the top of the page when the 'message' session variable is set. The <div> is initially visible and uses a JavaScript timeout to hide itself after 3 seconds. The content of the message is displayed within a <p> element. This provides a simple and visually appealing way to display messages to users in a Laravel application. --}}
