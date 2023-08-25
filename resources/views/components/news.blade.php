

{{-- <div class='bg-b m-ver bg-img-stock'>
    <div class='flex-c-center m-ver sh-g'>    
        @foreach($news as $new)
        <div class='t-center flex-c-center border-b m-ver m-hor bg-b-50 '>
            <h2 class='t-g m-ver'>{{$new->title}}</h2>
            <p>{{$new->description}}</p>
                        
        </div>
        @endforeach
    </div>
</div> --}}
<div class="flex flex-row flex-wrap justify-center gap-3">

<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('images/stock_market0.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$news[0]->title}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$news[0]->description}}</p>
    </div>
</div>
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('images/stock_market1.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$news[1]->title}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$news[1]->description}}</p>
    </div>
</div>
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('images/stock_market2.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$news[2]->title}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$news[2]->description}}</p>
    </div>
</div>
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('images/stock_market3.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$news[3]->title}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$news[3]->description}}</p>
    </div>
</div>
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('images/stock_market4.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$news[4]->title}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$news[4]->description}}</p>
    </div>
</div>
<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{asset('images/stock_market5.jpg')}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$news[5]->title}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$news[5]->description}}</p>
    </div>
</div>


</div>