<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('styles/style.css')}}">


    {{-- Added this script from alpinejs.dev --}}
    <script src="//unpkg.com/alpinejs" defer></script> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js'></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#081175",
                        // You can change the 'laravel' hardcoded color so that when you use the bg-laravel, the color will be whatever you want it to be This is the OG Laravel Color Code: #2563eb
                        laravel2: "#65a147",
                        laravel3: "#acce22"
                    },
                },
            },
        };
    </script>

    <title>StockViser | Track the Market with Confidence</title>
</head>

<body class="mb-48">
    {{-- <x-flash-message /> --}}
    
    <nav class="flex justify-between bg-laravel items-center mb-4">

        <a href="/">
            <img class="w-20 logo ml-5" src="{{ asset('images/logo.png') }}" alt="" />
            
            {{-- Inside public folder we add the images folder so that our asset function that will call the image we want --}}
        </a>

        {{-- category filter links --}}
        {{-- <ul class="flex">
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="{{ route('category', ['category' => 1]) }}">Tops</a>
            </li>
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="{{ route('category', ['category' => 2]) }}">Jeans</a>
            </li>
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="{{ route('category', ['category' => 3]) }}">Shoes</a>
            </li>
            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                <a href="{{ route('category', ['category' => 4]) }}">Accessories</a>
            </li>
        </ul> --}}
        
        {{-- Create product Button --}}
        <ul class="flex space-x-6 mr-6 text-lg">
            {{-- Adding this auth directive so that it doesn't display the register and login links after the user has been logged in --}}
            {{-- @auth content to be displayed when user is logged in --}}
            <li>

            </li>

              {{-- Create product Button --}}
                <li>
                    <a href="/" class="bg-black text-white py-2 px-4 rounded text-sm">Create Portfolio</a>
                </li>

                <li>
                    <a href="/companies/index" class="bg-black text-white py-2 px-4 rounded text-sm">List of Companies</a>
                </li>

                {{-- <li>
                    <a href="{{ route('cart.show') }}" class="hover:text-laravel"><i class="fa-sharp fa-solid fa-lg fa-cart-shopping"></i>&nbsp
                       My Cart</a>
                </li> --}}
{{--                 
                <li>
                    <a href="/" class="hover:text-laravel"><i class="fa-sharp fa-solid fa-lg fa-tag"></i>&nbsp
                        My Portfolio</a>
                </li>

                <li> {{-- added this LI to incorporate Logout ability --}}
                    {{-- <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button>
                            <i class="fa-solid fa-sharp fa-lg fa-door-closed" ></i>&nbsp Logout
                        </button>
                    </form>
                </li>  --}}

            {{-- @else content to be displayed when user is loggeed out --}}
                <li>
                    <a href="/" class="hover:text-laravel text-white"><i class="fa-solid fa-user-plus"></i>
                        Register</a>
                </li>
                
                <li>
                    <a href="/" class="hover:text-laravel text-white"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            {{-- @endauth --}}
        </ul>
    </nav>
    
    <main>
        @yield('newss')        
    </main>
    
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-20 mt-24 opacity-80 md:justify-center">
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved.</p>

    <ul>
        {{-- @auth --}}
        <li>
            {{-- href="/users/{{ auth()->user()->id }}/edit" --}}
            <a href="/" class="bg-black px-5 py-2 ml-10 hover:text-laravel rounded"><i class="fa-sharp fa-solid fa-user"></i>&nbsp My Profile</a>
        </li>
        {{-- @endauth --}}
    </ul>
    </footer>
</body>

</html>
