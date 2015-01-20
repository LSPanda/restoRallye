@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.rallyes.index') }}">Rallyes</a></li>
    <li class="active">Création d'un nouveau rallye</li>
@stop

@section('content')
    {{ Form::open(['route' => [ 'admin.rallyes.update', null], 'method' => 'post', 'file' => true ]) }}
        <div class="form-group">
            {{ Form::label('body', 'Description') }}
            {{ Form::textarea('body', null, ['id' => 'summernote']) }}
            {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    {{ Form::label('adress', 'Adresse du lieu de rendez vous') }}
                    {{ Form::text('adress', null, ['class' => 'form-control', 'require']) }}
                    {{ $errors->first('adress', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        {{ Form::label('postal_code', 'Code postal') }}
                        {{ Form::text('postal_code', null, ['class' => 'form-control', 'require', 'maxlength' => 4]) }}
                        {{ $errors->first('postal_code', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                    <div class="col-md-8">
                        {{ Form::label('city', 'Ville') }}
                        {{ Form::text('city', null, ['class' => 'form-control', 'require']) }}
                        {{ $errors->first('city', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                {{ Form::label('date', 'Date') }}
                <div class="row form-group">
                    <div class="col-xs-3">
                        {{ Form::text('dateDay', null, ['class' => 'form-control', 'require', 'maxlength' => 2, 'placeholder' => '20', 'title' => 'Jour']) }}
                    </div>
                    <div class="col-xs-3">
                        {{ Form::text('dateMonth', null, ['class' => 'form-control', 'require', 'maxlength' => 2, 'placeholder' => '12', 'title' => 'Mois']) }}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::text('dateYear', null, ['class' => 'form-control', 'require', 'maxlength' => 4, 'placeholder' => '2015', 'title' => 'Année']) }}
                    </div>
                </div>
                {{ $errors->first('date', '<div class="alert alert-danger">:message</div>') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::file('image', ['class' => 'file-input btn-lg btn-block btn-info', 'title' => 'Ajouter une photo de couverture', 'data-filename-placement' => 'inside']) }}
                            {{ $errors->first( 'image', '<div class="alert alert-danger">:message</div>' ) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-block btn-lg btn-success">Créer</button>
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
    </script>)
    {{ HTML::script('js/vendor/bootstrap/fileButton.js') }}
    <script type="text/javascript">
        $('.file-input').bootstrapFileInput();
    </script>
@stop
