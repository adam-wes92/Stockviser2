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

    <div class="">
        <div class="flex xl:flex-row lg:flex-row md:flex-col sm:flex-col flex-wrap gap-4 ">
            <x-card class="mx-auto  mt-24 xl:w-1/3 lg:w-2/3 md:w-2/3 sm:w-3/4 rounded-md bg-opacity-75 border-double min-w-1 ">
                <div class="p-6  bg-laravel h-full ">
                
                    <h1 class="text-center  pt-2 sm:text-xl md:text-2xl lg:text-3-xl xl:text-4xl font-bold uppercase text-laravel2" style="font:family 'Roboto', sans-serif;">
                    Your personal data</h1>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-white"><span class="font-bold">Name:</span> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200  my-4 text-white"> <span class="font-bold">Age: </span> 
                        @php
                            $bd=auth()->user()->birth_date;
                            $today=date("Y-m-d");
                            $age=substr($today,0,4)-substr($bd,0,4);
                            echo $age;
                        @endphp
                        y.o.
                    </p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-white"><span class="font-bold">E-mail:</span> {{ auth()->user()->email}}</p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-white"><span class="font-bold">Phone number:</span> {{ auth()->user()->phone_number}}</p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-white"><span class="font-bold">Adress:</span> {{ auth()->user()->address}}, {{ auth()->user()->city}}, {{ auth()->user()->country}}, {{ auth()->user()->zip}}</p>
                        <div class="flex space-x-6 mr-6 text-lg ">
                            <a href="/users/{{ auth()->user()->id }}/edit" class="mx-auto bg-laravel2 text-white py-2 px-4 rounded sm:text-lg md:text-xl lg:text-2xl xl:text-3xl hover:text-laravel">Change my personal data</a>
                        </div>
                    
                
            </div>
            </x-card>

            <x-card class="mx-auto  bg-opacity-75 mt-24 w-1/3 rounded-md xl:w-1/3 lg:w-2/3 md:w-2/3 sm:w-3/4 ">
                <div class="mx-auto p-6 bg-laravel3  h-full">                
                    <h1 class="text-center pt-2 sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold uppercase text-laravel sm:text-lg md:text-xl lg:text-2-xl xl:text-3xl" style="font:family 'Roboto', sans-serif;">
                    Top 3 companies in your portfolio</h1>
                    <p class="text-center pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl  text-gray-200 my-4 text-laravel">
                        With the best EPS-index
                    </p>
                    <div class="grid grid-cols-3 gap-4 mx-auto">  
                        <div class="">
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
            
        </div>
        
        <x-card class="p-10 mx-auto mt-24 w-3/4 rounded-md">
            <div class="">
            <h1 class="text-center pt-2 sm:text-lg md:text-xl lg:text-2-xl xl:text-3xl font-bold uppercase text-laravel t-center" style="font:family 'Roboto', sans-serif;">
                    Portfolio's resume</h1>
                    <p class="pb-2 text-2xl text-gray-200  sm:text-lg md:text-xl lg:text-2-xl xl:text-3xl my-4 text-laravel"> <span class="font-bold">Companies in portfolio: </span> 
                {{count($companies)}}</p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-laravel"><span class="font-bold">Portfolio gain:</span> {{$total_gain}}</p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-laravel"><span class="font-bold">Total investment:</span> {{$total_invest}}</p>
                    <p class="pb-2 sm:text-lg md:text-xl lg:text-2xl xl:text-3xl text-gray-200 my-4 text-laravel"><span class="font-bold">Portfolio performance:</span> {{number_format($portfolio_performance,2)}} %</p>
            </div>
        </x-card>
    
            <x-card class="p-10 mt-24 w-3/4 mx-auto rounded-md">
                <div class="">
                    <h1 class="pt-2 text-5xl font-bold uppercase text-laravel" style="font:family 'Roboto', sans-serif; ">
                        Your portfolio</h1>
                    
                        <div class="grid sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10">
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  min-w-100 border text-laravel font-bold hidden lg:block xl:block">Company Name</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  min-w-50 border text-laravel font-bold hidden sm:block md:block lg:block xl:block">Symbol</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden xl:block">Sector</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden lg:block xl:block">Market cap (trillions)</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden sm:block md:block lg:block xl:block">Analytics rating</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden sm:block md:block lg:block xl:block">Share quantity</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden md:block lg:block xl:block">Performance percentage</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden sm:block md:block lg:block xl:block">Current share cost</p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden sm:block md:block lg:block xl:block">24h price change </p>
                            <p class="text-center sm:text-sm md:text-lg lg:text-xl xl:text-2xl text-gray-200  border text-laravel font-bold hidden xl:block ">Last purchase date</p>

                        </div>
                            @foreach ($companies as $c)
                            <div class="grid sm:grid-cols-5 md:grid-cols-6 lg:grid-cols-8 xl:grid-cols-10">
                                <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border min-w-100 hidden lg:block xl:block">{{$c->name}}</p>
                                <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border min-w-50 hidden sm:block md:block lg:block xl:block">{{$c->ticker}}</p>
                                <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden xl:block">{{$c->sector}}</p>
                                <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden lg:block xl:block">{{number_format($c->market_cap/1000000000000,2)}}</p>
                                <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden sm:block md:block lg:block xl:block">{{$c->average_analyst_rating}}</p>
                                @foreach ($companies_in_portfolio as $cp)
                                    @if ($cp->company_id==$c->id)
                                        <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden sm:block md:block lg:block xl:block">{{$cp->shares_qty}}</p>
                                        @if ($cp->performance_percentage>0)
                                            <p class="text-center bg-laravel2 sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden md:block lg:block xl:block">{{$cp->performance_percentage}}</p>
                                        @elseif($cp->performance_percentage<0)
                                            <p class="text-center bg-red-500 sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden md:block lg:block xl:block">{{$cp->performance_percentage}}</p>
                                        @endif
                                        
                                        
                                        <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden sm:block md:block lg:block xl:block">{{$cp->current_cost}}</p>
                                        <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden sm:block md:block lg:block xl:block">
                                            <span
                                            class="{{ $delta >= 0 ? 'text-success' : 'text-danger' }}"
                                            style="display: inline-block; margin-right: 5px;">
                                            {{ $delta >= 0 ? '+' : '-' }}
                                            ${{ number_format(abs($delta), 2) }}
                                            <i class="{{ $delta >= 0 ? 'fas fa-arrow-up' : 'fas fa-arrow-down' }}"></i>
                                            </span></p>
                                        <p class="text-center sm:text-xs md:text-sm lg:text-lg xl:text-xl border hidden xl:block">{{$cp->last_purchase_date}}</p>
                                    @endif
                                @endforeach
                            </div>
                            @endforeach       
                </div>
                <div class="flex space-x-6 mr-6 my-6 p-6 text-lg ">
                    <a href="/" class="bg-laravel text-white py-2 mx-auto px-4 rounded sm:text-lg md:text-xl lg:text-2-xl xl:text-3xl hover:text-laravel2">Add companies to your portfolio</a>
                </div>
            </x-card>


    </div>
        
</x-layout>
