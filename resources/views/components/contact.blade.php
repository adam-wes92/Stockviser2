

<div class="flex justify-center align-center space-y-4 mb-4 text-xl m-10">
    <x-card class="w-80 h-100 ">
    <h1 class="mb-3">Contact Us:</h1>

    <form action="" method="POST">
        @csrf
        <input class="mb-3" type="text" name="name" placeholder="Name">
        <br>

        <input type="email" name="email" placeholder="Email">

        <label for="message">Question for advisors</label>
        <textarea name="message" id="message" rows="5" placeholder="Please type your message to our advisers and we will reply as soon as we can"></textarea>
        <br><br>

        <button type="submit" class="bg-black text-white py-2 px-4 rounded text-sm">Submit</button>
    </form>
</x-card>
</div>

