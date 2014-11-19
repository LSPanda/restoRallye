@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li class="active">Édition ({{ $restaurant->name }})</li>
@stop

@section('content')
    {{ Form::open(['route' => ['admin.restaurants.update', $restaurant->id], 'method' => 'put']) }}
        {{ Form::hidden('slug', $restaurant->slug) }}
        <div class="form-group">
            {{ Form::label('name', 'Nom du restaurant') }}
            {{ Form::text('name', $restaurant->name, ['class' => 'form-control', 'require']) }}
            {{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('body', 'Description') }}
            {{ Form::textarea('body', $restaurant->body, ['id' => 'summernote']) }}
            {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                        {{ Form::email('email', $restaurant->email, ['class' => 'form-control', 'placeholder' => 'email@domaine.com']) }}
                        {{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('website', 'Site internet') }}
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-globe"></span>
                        {{ Form::url('website', $restaurant->website, ['class' => 'form-control', 'placeholder' => 'http://nom-du-site.com']) }}
                        {{ $errors->first('website', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('tel', 'Téléphonne') }}
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                        {{ Form::text('tel', $restaurant->tel, ['class' => 'form-control', 'placeholder' => '0*********']) }}
                        {{ $errors->first('tel', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    {{ Form::label('adress', 'Adresse du restaurant') }}
                    {{ Form::text('adress', $restaurant->adress, ['class' => 'form-control', 'require']) }}
                    {{ $errors->first('adress', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('postal_code', 'Code postal') }}
                            {{ Form::text('postal_code', $restaurant->postal_code, ['class' => 'form-control', 'require', 'maxlength' => 4]) }}
                            {{ $errors->first('postal_code', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {{ Form::label('city', 'Ville') }}
                            {{ Form::text('city', $restaurant->city, ['class' => 'form-control', 'require']) }}
                            {{ $errors->first('city', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary pull-right">Éditer</button>
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
