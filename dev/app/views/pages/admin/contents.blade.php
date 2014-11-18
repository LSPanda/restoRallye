@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Contenus</li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">Message d'accueil</div>
                    <div class="panel-body">
                        {{ Form::open(['route' => ['admin.contents.update', $about->id], 'method' => 'put']) }}
                            <div class="form-group">
                                {{ Form::label('name', 'Titre') }}
                                {{ Form::text('name', $about->name, ['class' => 'form-control', 'require']) }}
                                {{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('body', 'Contenu') }}
                                {{ Form::textarea('body', $about->body, ['id' => 'summernote']) }}
                                {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary pull-right">Éditer</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop()

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
