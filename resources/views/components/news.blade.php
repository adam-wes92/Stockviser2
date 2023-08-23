@extends('components.layout')
@section('newss')
<div class='bg-b m-ver bg-img-stock'>
    <div class='flex-c-center m-ver sh-g'>    
        @foreach($news as $new)
        <div class='t-center flex-c-center border-b m-ver m-hor bg-b-50 '>
            <h2 class='t-g m-ver'>{{$new['title']}}</h2>
            <p>{{$new['description']}}</p>
            <div class='flex-r-space'>
                <p>{{$new['snippet']}}</p>
                <h6>{{$new['source']}}</h6>                
            </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection
