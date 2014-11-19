@extends('layouts.default')

@section('content')
    <div id="slide1" class="slideImage"></div>
    <div class="slideText">
        <h3>Liste des restaurants</h3>
        @foreach($restaurants as $restaurant)
            <div class="restaurants">
                <a href="{{ route('restaurants.show', $restaurant->id) }}">
                    <h4>{{ $restaurant->name }}, <span>{{ $restaurant->city }}</span></h4>
                    <img src="uploads/restaurants/{{ $restaurant->id }}/main.jpg" alt="">
                </a>
            </div>
        @endforeach
    </div>
@stop
