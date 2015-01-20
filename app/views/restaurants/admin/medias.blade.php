@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li><a href="{{ route('admin.restaurants.edit', $id_restaurant) }}">Édition</a></li>
    <li class="active">Gestion des médias</li>
@stop

@section('content')
    <div class="row">

    </div>
    <div class="row">
        <div class="thumbnail col-md-6">
            @if( $photoCouverture )
                <p class="text-center lead">Photo de couverture</p>
                <img src="/uploads/restaurants/{{ $id_restaurant }}/{{ $photoCouverture }}?{{ rand(0,100) }}">
            @else
                <p class="text-center lead">Débutez botre galerie de photo à l'aide du bouton à droite.</p>
            @endif
        </div>
        <div class="caption col-md-6">
            {{ Form::open([
                'route' => [
                    'admin.restaurants.add.medias',
                    'id' => $id_restaurant
                ],
                'method' => 'post',
                'files'  => true,
                'id'     => 'formUpload'
            ]) }}
                <div class="form-group">
                    {{ Form::file('images[]', ['multiple', 'class' => 'file-input btn-lg btn-block btn-info', 'title' => 'Choisir de nouvelles photos', 'data-filename-placement' => 'inside']) }}
                    {{ $errors->first( 'images', '<div class="alert alert-danger">:message</div>' ) }}

                    <button type="submit" class="btn btn-block btn-lg btn-default">Envoyer</button>
                </div>
                <div class="fallback">
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        @foreach(array_chunk($photos, 4) as $row)
            <div class="row">
                @foreach($row as $photo)
                    <div class="hidden-xs hidden-sm col-md-3">
                        <div class="thumbnail">
                            <img src="/uploads/restaurants/{{ $id_restaurant }}/{{ $photo }}">
                            <div class="caption">
                                <p>
                                    <a href="{{ route('admin.restaurant.setCouverture.medias', [ 'id' => $id_restaurant, 'file' => $photo ])  }}" type="submit" class="btn btn-block btn-primary" title="Mettre en photo de couverture">
                                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                    </a>
                                </p>
                                {{ Form::open([
                                    'route' => [
                                        'admin.restaurants.destroy.medias',
                                        'id' => $id_restaurant,
                                        'file' => $photo
                                    ],
                                    'method' => 'delete'
                                ]) }}
                                    <button type="submit" class="btn btn-block btn-danger" title="Supprimer la photo">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        @foreach(array_chunk($photos, 2) as $row)
            <div class="row">
                @foreach($row as $photo)
                    <div class="col-xs-6 hidden-md hidden-lg">
                        <div class="thumbnail">
                            <img src="/uploads/restaurants/{{ $id_restaurant }}/{{ $photo }}" class="img-rounded">
                            <div class="caption">
                                <p>
                                    <a href="{{ route('admin.restaurant.setCouverture.medias', [ 'id' => $id_restaurant, 'file' => $photo ])  }}" type="submit" class="btn btn-block btn-primary" title="Mettre en photo de couverture">
                                        <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                    </a>
                                </p>
                                {{ Form::open([
                                    'route' => [
                                        'admin.restaurants.destroy.medias',
                                        'id' => $id_restaurant,
                                        'file' => $photo
                                    ],
                                    'method' => 'delete'
                                ]) }}
                                    <button type="submit" class="btn btn-block btn-danger" title="Supprimer la photo">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop

@section('scripts')
    {{ HTML::script('js/vendor/bootstrap/fileButton.js') }}
    <script type="text/javascript">
        $('.file-input').bootstrapFileInput();
    </script>
@stop
