@include('html_head')


<div class="container">
    <h1>Welcome, {{ $user->first_name }}</h1>
    <p>Email: {{ $user->email }}</p>
</div>
