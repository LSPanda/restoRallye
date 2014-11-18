@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
    <li class="active">{{ $user->login }}</li>
@stop

@section('content')
    <h2 class="sub-header">{{ $user->login}}</h2>

    {{ $user->email }}

    <p>
        <adress>{{ $user->adress }}, {{ $user->postal_code }} {{ $user->city }}</adress>
    </p>
@stop
