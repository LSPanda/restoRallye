@extends('layouts.admin')

@section('content')
    <h2 class="sub-header">Liste des menus</h2>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu[ 'id' ] }}</td>
                        <td>
                            <dl>
                                @foreach($menu[ 'menu' ] as $menuName)
                                    <dt>{{ $menuName->name }}</dt>
                                    @foreach($menuName->content as $menuContent)
                                        <dd>{{ $menuContent }}</dd>
                                    @endforeach
                                @endforeach
                            </dl>
                        </td>
{{--                        <td><pre>{{ print_r($menu) }}</pre></td>--}}
                        <td>
                            <a href="{{ route('admin.menus.edit', $menu[ 'id' ]) }}" title="Éditer le menu">
                                <button class="btn btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </a>
                            <a href="{{ route('admin.menus.destroy', $menu[ 'id' ]) }}" title="Supprimer le menu">
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
