@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.posts.index') }}">Articles</a></li>
    <li class="active">Édition de l'article : {{ $post->name }}</li>
@stop

@section('content')
    {{ Form::open(['route' => ['admin.posts.update', $post->id], 'method' => 'put', 'files' => true]) }}
        <div class="row">
            <div class="form-group col-md-8">
                {{ Form::label('name', 'Titre') }}
                {{ Form::text('name', $post->name, ['class' => 'form-control', 'require']) }}
                {{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
            </div>
            <div class="form-group col-md-4">
                <label for=""></label>
                {{ Form::file('image', ['class' => 'file-input btn-lg btn-block btn-info', 'title' => 'Modifier l\'image de couverture', 'data-filename-placement' => 'inside']) }}
                {{ $errors->first( 'image', '<div class="alert alert-danger">:message</div>' ) }}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                {{ Form::label('body', 'Description') }}
                {{ Form::textarea('body', $post->body, ['id' => 'summernote']) }}
                {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
            </div>
            @if($post->thumb)
                <div class="well col-md-4 thumbnail">
                    <img src="/uploads/posts/{{ $post->id }}/{{ $post->thumb }}" alt="Image de couverture de l'article" >
                </div>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-lg btn-success">Éditer</button>
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
