<div class="flex justify-center align-center text-xl bg-gray-50 border border-gray-200 text-laravel2  rounded p-10 bg-laravel">



    <form action="" method="POST" class="w-80">
        @csrf
        <h1 class="mb-3 font-bold text-lrg">Contact Us : </h1>

        <input class="mb-3 w-80 rounded p-2" type="text" name="name" placeholder="Name">
        <br>

        <input class="w-80 mb-3 rounded p-2" type="text" name="email" placeholder="Email">
        <br>
        <input class="w-80 mb-3 rounded p-2" type="text" name="nasdaq" placeholder="Company NASDAQ code">
        <br><br>
        <label class="font-bold text-lrg" for="message">Question for advisors : </label>
        <br>
        <textarea class="w-80 mt-3 rounded p-2"name="message" id="message" rows="5" placeholder="Please type your message to our advisers and we will reply as soon as we can"></textarea>
        <br>

        <button type="submit" class="bg-black text-white py-2 px-4 rounded text-sm">Submit</button>
    </form>
</div>

