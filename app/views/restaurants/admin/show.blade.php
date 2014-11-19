@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li class="active">{{ $restaurant->name }}</li>
@stop

@section('content')
    <h2 class="sub-header">{{ $restaurant->name }}</h2>

    {{ $restaurant->body }}

    <p>
        <adress>{{ $restaurant->adress }}, {{ $restaurant->postal_code }} {{ $restaurant->city }}</adress>
    </p>
@stop
