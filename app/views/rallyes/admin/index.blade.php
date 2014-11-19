@extends('......layouts.admin')

@section('content')
<h2 class="sub-header">Liste des rallyes</h2>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Restaurants</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rallyes as $rallye)
        <tr>
            <td>{{ $rallye->id }}</td>
            <td></td>
            <td>
                <a href="{{ route('admin.rallyes.edit', $rallye->id) }}" title="Éditer le rallye">
                    <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </a>
                <a href="{{ route('admin.rallyes.destroy', $rallye->id) }}" title="Supprimer le rallye">
                    <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
