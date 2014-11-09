@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li class="active">Édition ({{ $restaurant->name }})</li>
@stop

@section('content')
    Formulaire
@stop
