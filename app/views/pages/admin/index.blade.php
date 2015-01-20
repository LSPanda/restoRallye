@extends('layouts.admin')

@section('content')
    <h1>Administration</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">Prochain Resto-Rallye</div>
                @if ($nextRallye)
                    <table class="table">
                        <tr>
                            <th>Lieu de rendez vous</th>
                            <td>{{ $nextRallye->adress . ', ' . $nextRallye->postal_code . ' ' . $nextRallye->city }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ date('d/m/Y' , strtotime($nextRallye->date)) }}</td>
                        </tr>
                        <tr>
                            <th>Restaurants</th>
                            <td>
                                <ul>
                                    @foreach($nextRallye->restaurants as $restaurant)
                                        <li><a href="{{ route( 'admin.restaurants.show', $restaurant->id ) }}">{{ $restaurant->name }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a class="btn btn-block btn-info" href="{{ route( 'admin.rallyes.edit', $nextRallye->id ) }}">Modifier le resto-rallye</a></td>
                        </tr>
                    </table>
                @else
                    <div class="panel-body">
                        <p class="lead text-center">Aucun resto-rallye prévu</p>
                        <a class="btn btn-block btn-primary" href="{{ route('admin.rallyes.create') }}">Prévoir un resto-rallye</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop()
