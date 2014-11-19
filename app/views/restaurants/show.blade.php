@extends('layouts.default')

@section('content')
    <div id="slide1" class="slideImage"></div>
    <div class="slideText">
        <h3>{{ $restaurant->name }}</h3>
        {{ $restaurant->body }}
        <hr/>
        <p><adress>{{ $restaurant->adress }}, {{ $restaurant->postal_code }} {{ $restaurant->city }}</adress></p>
        <p><a href="{{ $restaurant->website }}">{{ $restaurant->website }}</a></p>
        <p>{{ $restaurant->tel }}</p>
    </div>
@stop
