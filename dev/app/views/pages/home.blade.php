@extends('layouts.default')
@section('content')
    <div id="slide1" class="slideImage">
        <blockquote>
            Ne manquez pas notre prochain <a href="#">rendez-vous</a> dans la région de Namur.
        </blockquote>
    </div>
    <div class="slideText explain">
        <h3>{{ $about->name }}</h3>
        <p>{{ $about->body }}</p>
    </div>
    <div id="slide2" class="slideImage"></div>
    <div class="slideText slideRestaurant"><h3>Nous vous conseillons ces adresses</h3>

        @foreach($restaurants as $restaurant)
            <div class="restaurants">
                <a href="{{ route('restaurants.show', $restaurant->id) }}">
                    <h4>{{ $restaurant->name }}, <span>{{ $restaurant->city }}</span></h4>
                    <img src="uploads/restaurants/{{ $restaurant->id }}/main.jpg" alt="">
                </a>
            </div>
        @endforeach
    </div>
    <div id="slide3" class="slideImage"></div>
@stop
