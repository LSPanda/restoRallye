@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.rallyes.index') }}">Rallyes</a></li>
    <li class="active">Édition du rallye du {{ date('d/m/Y' , strtotime($rallye->date)) }}</li>
@stop

@section('content')
    {{ Form::open(['route' => ['admin.rallyes.update', $rallye->id], 'method' => 'put']) }}
        <div class="row">
            <div class="form-group col-md-9">
                {{ Form::label('body', 'Description') }}
                {{ Form::textarea('body', $rallye->body, ['id' => 'summernote']) }}
                {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
            </div>
            <div class="form-group col-md-3 well">
                {{ Form::label('restaurantList', 'Restaurants du rallyes') }}
                @foreach($restaurants as $restaurant)
                    <div class="checkbox">
                        <label for="{{ $restaurant->id }}">
                            {{ Form::checkbox('restaurants[]', $restaurant->id, in_array($restaurant->id, $restaurants_attached), [ 'id' => $restaurant->id ]) }}
                            {{ $restaurant->name }}
                        </label>
                    </div>
                @endforeach
                {{ $errors->first('restaurants', '<div class="alert alert-danger">:message</div>') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    {{ Form::label('adress', 'Adresse du lieu de rendez vous') }}
                    {{ Form::text('adress', $rallye->adress, ['class' => 'form-control', 'require']) }}
                    {{ $errors->first('adress', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        {{ Form::label('postal_code', 'Code postal') }}
                        {{ Form::text('postal_code', $rallye->postal_code, ['class' => 'form-control', 'require', 'maxlength' => 4]) }}
                        {{ $errors->first('postal_code', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::label('city', 'Ville') }}
                        {{ Form::text('city', $rallye->city, ['class' => 'form-control', 'require']) }}
                        {{ $errors->first('city', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                {{ Form::label('date', 'Date') }}
                <div class="row form-group">
                    <div class="col-xs-3">
                        {{ Form::text('dateDay', $rallye->dateDay, ['class' => 'form-control', 'require', 'maxlength' => 2, 'placeholder' => '20', 'title' => 'Jour']) }}
                    </div>
                    <div class="col-xs-3">
                        {{ Form::text('dateMonth', $rallye->dateMonth, ['class' => 'form-control', 'require', 'maxlength' => 2, 'placeholder' => '12', 'title' => 'Mois']) }}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::text('dateYear', $rallye->dateYear, ['class' => 'form-control', 'require', 'maxlength' => 4, 'placeholder' => '2015', 'title' => 'Année']) }}
                    </div>
                </div>
                {{ $errors->first('date', '<div class="alert alert-danger">:message</div>') }}
                <div class="row">
                    <div class="col-md-8">
                        <a href="{{ route( 'admin.rallyes.medias', $rallye->id ) }}" type="submit" class="btn btn-block btn-lg btn-info">
                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                            Gestion de la galerie
                        </a>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-lg btn-success">Éditer</button>
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
@stop

@section('styles')
    {{ HTML::style('css/vendor/summernote/summernote.css') }}
    {{ HTML::style('css/vendor/summernote/summernote-bs3.css') }}
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
@stop

@section('scripts')
    {{ HTML::script('js/vendor/summernote/summernote.min.js') }}
    {{ HTML::script('js/vendor/summernote/lang/summernote-fr-FR.js') }}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['misc', ['undo', 'redo']],
                    ['textStyle', ['style']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']]
                ],
                lang: 'fr-FR'
            });
        });
    </script>
@stop
