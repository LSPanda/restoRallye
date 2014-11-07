@extends('layouts.admin')

@section('content')
    <h2 class="sub-header">Liste des restaurants</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Site</th>
                    <th>Email</th>
                    <th>Téléphonne</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->adress . ' ' . $restaurant->adress_number }}<br>
                            {{ $restaurant->postal_code . ' ' . $restaurant->city }}</td>
                        <td>{{ $restaurant->website }}</td>
                        <td>{{ $restaurant->email }}</td>
                        <td>{{ $restaurant->tel }}</td>
                        <td>
                            <a href="{{ route('admin.restaurants.edit') }}">
                                <button class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </a>
                            <button class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
