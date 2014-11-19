@extends('......layouts.admin')

@section('content')
    <h2 class="sub-header">Liste des menus</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td><pre>{{ $menu->body }}</pre></td>
                        <td>
                            <a href="{{ route('admin.menus.edit', $menu->id) }}" title="Éditer le menu">
                                <button class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </a>
                            <a href="{{ route('admin.menus.destroy', $menu->id) }}" title="Supprimer le menu">
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
