@extends('layouts/app')

@section('content')

    @foreach($categories as $key => $category)
    <div class="category-container">
        <h1>{{ $key }}</h1>
        <hr>
        <div class="items-container">
        @foreach($category as $artisan)
        <div class="item-card-wrap">
            <div class="item-card">
                <img src="{{ $artisan->image_src }}" alt="{{ $artisan->maker_name }} : {{ $artisan->sculpt_name }} - {{ $artisan->colorway_name }}"></img>
                <h2 class="title">{{ $artisan->maker_name }}</h2>
                <h4 class="">{{ $artisan->sculpt_name }} {{ (!empty($artisan->colorway_name) ? "(".$artisan->colorway_name.")" : "" ) }}</h4>
                <div></div>
                <div class="price">$ {{ number_format(rand(25, 190), 2) }} <small style="color: green">{{ (rand(0,1000) > 777 ? ' (trades)' : '' ) }}</small></div>
                <small class="user"></span>Sale by</span> revertcreations</small>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    @endforeach

@endsection