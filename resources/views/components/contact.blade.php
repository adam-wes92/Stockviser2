<div class="flex justify-center align-center text-xl bg-gray-50 border border-gray-200 text-laravel2  rounded p-10 bg-laravel">

    <form action="" method="POST" class="w-80 text-lrg">
        @csrf
        <h1 class="mb-3 text-2xl underline">Contact Us </h1>

        <label for="message">Full Name : </label>
        <input class="mb-3 w-80 rounded p-2" type="text" name="name" placeholder="Name">
        <br>

        <label for="message">Email : </label>
        <input class="w-80 mb-3 rounded p-2" type="text" name="email" placeholder="Email">
        <br>

        <label for="message">Compnay Ticker/Symbol : </label>
        <input class="w-80 rounded p-2" type="text" name="nasdaq" placeholder="AAPL, GOOG, ATVI, SQSP...">
        <br><br>

        <label for="message">Questions for Advisers : </label>
        <br>
        <textarea class="w-80 rounded p-2"name="message" id="message" rows="5" placeholder="Please type your message to our advisers and we will reply as soon as we can"></textarea>
        <br>

        <button type="submit" class="bg-black text-white py-2 px-4 rounded text-sm">Submit</button>
    </form>
</div>

