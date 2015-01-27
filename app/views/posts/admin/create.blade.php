@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.posts.index') }}">Rallyes</a></li>
    <li class="active">Rédaction d'un article</li>
@stop

@section('content')
    {{ Form::open(['route' => ['admin.posts.store', null], 'method' => 'post', 'files' => true]) }}
        <div class="form-group">
            {{ Form::label('name', 'Titre') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'require']) }}
            {{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('body', 'Description') }}
            {{ Form::textarea('body', null, ['id' => 'summernote']) }}
            {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="form-group row">
            <div class="col-md-8">
                {{ Form::file('image', ['class' => 'file-input btn-lg btn-block btn-info', 'title' => 'Ajouter une image de couverture', 'data-filename-placement' => 'inside']) }}
                {{ $errors->first( 'image', '<div class="alert alert-danger">:message</div>' ) }}
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-block btn-lg btn-success btn-block">Créer</button>
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
    {{ HTML::script('js/vendor/bootstrap/fileButton.js') }}
    <script type="text/javascript">
        $('.file-input').bootstrapFileInput();
    </script>
@stop
