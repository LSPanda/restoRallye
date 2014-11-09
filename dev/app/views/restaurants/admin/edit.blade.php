@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li>Édition ({{ $restaurant->name }})</li>
@stop

@section('content')
    Formulaire
@stop
