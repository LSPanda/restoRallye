@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
    <li class="active">Édition ({{ $restaurant->name }})</li>
@stop

@section('content')
    {{ Form::open(['route' => 'admin.restaurants.store']) }}
        <div class="form-group">
            {{ Form::label('name', 'Nom du restaurant') }}
            {{ Form::text('name', $restaurant->name, ['class' => 'form-control', 'require']) }}
        </div>
        <div class="form-group">
            {{ Form::label('body', 'Description') }}
            <div id="summernote">{{ $restaurant->body }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('adress', 'Adresse du restaurant') }}
            <div class="row">

            </div>
            {{ Form::text('name', null, ['class' => 'form-control', 'require']) }}
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Nom du restaurant') }}
            {{ Form::text('name', null, ['class' => 'form-control', 'require']) }}
        </div>
        <button type="submit" class="btn btn-default">Éditer</button>
    {{ Form::close() }}
@stop

@section('styles')
    {{ HTML::style('css/vendor/summernote/summernote.css') }}
    {{ HTML::style('css/vendor/summernote/summernote-bs3.css') }}
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
@stop

@section('scripts')
    {{ HTML::script('js/vendor/summernote/summernote.min.js') }}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [

                ]
            });
        });
    </script>
@stop
