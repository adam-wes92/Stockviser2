<x-layout>
    <section class="relative h-50  flex flex-col justify-center align-center space-y-4 mb-4">

    
    <div class=" text-center z-10">
        <h1 class="pt-2 text-6xl font-bold uppercase text-laravel" style="font:family 'Roboto', sans-serif;">
            Welcome, <span class="text-laravel2">{{ auth()->user()->first_name }}</span>, to your dashboard</h1>
        <p class="pb-2 text-2xl text-gray-200 font-bold my-4 text-laravel3">
            Get ready to dive into the world of stock trading and take control of your financial future.
        </p>
    </div>
 </section>
   <div class="flex-r-space">
        <div class="">
            <x-card class="p-10  mx-auto mt-24 sh-g">
                <div class="bg-laravel p-6">
                    <h1 class="pt-2 text-2xl font-bold uppercase text-laravel2 t-center" style="font:family 'Roboto', sans-serif;">
                    Your personal data</h1>
                    <p class="pb-2 text-2xl text-gray-200 my-4 text-white"><span class="font-bold">Name:</span> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                    <p class="pb-2 text-2xl text-gray-200  my-4 text-white"> <span class="font-bold">Age: </span> 
                        @php
                            $bd=auth()->user()->birth_date;
                            $today=date("Y-m-d");
                            $age=substr($today,0,4)-substr($bd,0,4);
                            echo $age;
                        @endphp
                        y.o.
                    </p>
                    <p class="pb-2 text-2xl text-gray-200 my-4 text-white"><span class="font-bold">E-mail:</span> {{ auth()->user()->email}}</p>
                    <p class="pb-2 text-2xl text-gray-200 my-4 text-white"><span class="font-bold">Phone number:</span> {{ auth()->user()->phone_number}}</p>
                    <p class="pb-2 text-2xl text-gray-200 my-4 text-white"><span class="font-bold">Adress:</span> {{ auth()->user()->address}}, {{ auth()->user()->city}}, {{ auth()->user()->country}}, {{ auth()->user()->zip}}</p>
                        <div class="flex space-x-6 mr-6 text-lg ">
                            <a href="/users/{{ auth()->user()->id }}/edit" class="t-center bg-laravel2 text-white py-2 px-4 rounded text-sm hover:text-laravel">Change my personal data</a>
                        </div>
                    
                </div>
            </x-card>
            <x-card class="p-10  mx-auto mt-24 sh-g">
                <div class="bg-laravel3">
                    <h1 class="pt-2 text-2xl font-bold uppercase text-laravel t-center" style="font:family 'Roboto', sans-serif;">
                    Top 3 companies in your portfolio</h1>
                    <p class="pb-2 text-2xl text-gray-200 my-4 text-laravel t-center">
                        With the best EPS-index
                    </p>
                    <div class="flex-r-space">  
                        <div class="flex-c-center">
                            <img src="{{asset('images/stock_market1.jpg')}}" style="width:150px" alt="">
                            <p>56.33</p>
                        </div>
                        <div class="flex-c-center">
                            <img src="{{asset('images/stock_market2.jpg')}}" style="width:150px" alt="">
                            <p>34.9</p>
                        </div>
                        <div class="flex-c-center">
                            <img src="{{asset('images/stock_market3.jpg')}}" style="width:150px" alt="">
                            <p>2.5</p>
                        </div>
                    </div>
                </div>
            </x-card>
            <x-card class="p-10  mx-auto mt-24 sh-b">
            <div class=""></div>
            </x-card>
        </div>
        <div class="">
            <x-card class="p-10 mt-24 sh-b ">
                <div class="t-center">
                    <h1 class="pt-2 text-5xl font-bold uppercase text-laravel" style="font:family 'Roboto', sans-serif; ">
                        Your portfolio</h1>
                    <x-card class="p-10  mt-24">
                        <div class="flex-r">
                            <p class="border w-200  text-xl text-gray-200  text-laravel font-bold ">Company Name</p>
                            <p class="border w-100  text-xl text-gray-200  text-laravel font-bold">Symbol</p>
                            <p class="border w-200  text-xl text-gray-200  text-laravel font-bold">Sector</p>
                            <p class="border w-200  text-xl text-gray-200  text-laravel font-bold">Market cap</p>
                            <p class="border w-150  text-xl text-gray-200  text-laravel font-bold">Analytics rating</p>
                            <p class="border w-100  text-xl text-gray-200  text-laravel font-bold">Share quantity (st)</p>
                            <p class="border w-100  text-xl text-gray-200  text-laravel font-bold">Performance percentage</p>
                            <p class="border w-100  text-xl text-gray-200  text-laravel font-bold">Current share cost</p>
                            <p class="border w-150  text-xl text-gray-200  text-laravel font-bold">Last purchase date</p>
                        </div>
                        @foreach ($companies as $c)
                            <div class="flex-r">
                                <p class="border w-200 min-w-max">{{$c->name}}</p>
                                <p class="border w-100 min-w-max">{{$c->ticker}}</p>
                                <p class="border w-200 min-w-max">{{$c->sector}}</p>
                                <p class="border w-200 min-w-max">{{$c->market_cap}}</p>
                                <p class="border w-150 min-w-max">{{$c->average_analyst_rating}}</p>
                                @foreach ($companies_in_portfolio as $cp)
                                    @if ($cp->company_id==$c->id)
                                        <p class="border w-100 min-w-max">{{$cp->shares_qty}}</p>
                                        <p class="border w-100 min-w-max">{{$cp->performance_percentage}}</p>
                                        <p class="border w-100 min-w-max">{{$cp->current_cost}}</p>
                                        <p class="border w-150 min-w-max">{{$cp->last_purchase_date}}</p>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach    
                    </x-card>    
                </div>
                <div class="flex space-x-6 mr-6 my-6 p-6 text-lg ">
                    <a href="/" class="t-center bg-laravel text-white py-2 px-4 rounded text-sm hover:text-laravel2">Add companies to your portfolio</a>
                </div>
            </x-card>
        </div>
   </div>
    
    
   


</x-layout>
