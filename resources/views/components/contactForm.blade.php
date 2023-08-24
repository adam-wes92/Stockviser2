<div class="flex justify-center align-center text-xl bg-gray-50 border border-gray-200 text-laravel2  rounded p-10 bg-laravel">
    <form action="{{ route('contact.us.store') }}" method="POST" class="w-80 text-lrg">
        @csrf
        <h1 class="mb-3 text-2xl underline">Contact Us</h1>

        <label for="name">Full Name:</label>
        <input class="mb-3 w-80 rounded p-2" type="text" name="name" placeholder="Name" value="{{ old('name') }}">
        @error('name')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input class="w-80 mb-3 rounded p-2" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <br>

        <label for="ticker">Company Ticker/Symbol:</label>
        <input class="w-80 rounded p-2" type="text" name="ticker" placeholder="AAPL, GOOG, ATVI, SQSP..." value="{{ old('ticker') }}">
        @error('ticker')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <br>

        <label for="subject">Subject:</label>
        <input class="w-80 mb-3 rounded p-2" type="text" name="subject" placeholder="Subject of message" value="{{ old('subject') }}">
        @error('subject')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <br>

        <label for="message">Questions for Advisers:</label>
        <br>
        <textarea class="w-80 rounded p-2" name="message" id="message" rows="5" placeholder="Please type your message to our advisers and we will reply as soon as we can">{{ old('message') }}</textarea>
        @error('message')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        <br>

        <button type="submit" class="bg-black text-white py-2 px-4 rounded text-sm">Submit</button>
    </form>
</div>
