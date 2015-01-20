@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li class="active">{{ $restaurant->name }}</li>
@stop

@section('content')
    <a class="btn btn-primary pull-right" href="{{ route( 'admin.restaurants.edit', $restaurant->id ) }}">Éditer</a>
    <h2 class="sub-header">{{ $restaurant->name }}</h2>

    {{ $restaurant->body }}

    <p>
        <adress>{{ $restaurant->adress }}, {{ $restaurant->postal_code }} {{ $restaurant->city }}</adress>
    </p>
@stop
