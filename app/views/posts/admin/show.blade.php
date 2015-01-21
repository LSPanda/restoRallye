@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.posts.index') }}">Article</a></li>
    <li class="active">{{ $post->name }}</li>
@stop

@section('content')
    <a class="btn btn-primary pull-right" href="{{ route( 'admin.posts.edit', $post->id ) }}">Éditer</a>
    <h2 class="sub-header">{{ $post->name }}</h2>
    <div class="thumbnail">
        <img src="/uploads/posts/{{ $post->id }}/{{ $post->thumb }}" alt="Image de l'article" >
    </div>
    {{ $post->body }}
@stop
