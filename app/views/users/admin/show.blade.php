@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
    <li class="active">{{ $user->login }}</li>
@stop

@section('content')
    <a class="btn btn-primary pull-right" href="{{ route( 'admin.users.edit', $user->id ) }}">Éditer</a>
    <h2 class="sub-header">{{ $user->name . ' ' . $user->surname }}</h2>
    <table class="table">
        <tr>
            <th>Email</th>
            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td><adress>{{ $user->adress }}, {{ $user->postal_code }} {{ $user->city }}</adress></td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th>GSM</th>
            <td>{{ ($user->gsm) ? $user->gsm : '/' }}</td>
        </tr>
    </table>

    <p>

    </p>

@stop
