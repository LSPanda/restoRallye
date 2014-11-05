@extends('layouts.admin')

@section('content')
    <ul>
        @foreach($restaurants as $restaurant)
            <li>{{ $restaurant->name }}</li>
        @endforeach
    </ul>
@stop
