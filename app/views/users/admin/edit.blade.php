@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
    <li class="active">Édition ({{ $user->login }})</li>
@stop

@section('content')
    {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}
        <div class="form-group">
            {{ Form::label('login', 'Login') }}
            {{ Form::text('login', $user->login, ['class' => 'form-control', 'require']) }}
            {{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', $user->email, ['class' => 'form-control', 'require']) }}
            {{ $errors->first('body', '<div class="alert alert-danger">:message</div>') }}
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    {{ Form::label('adress', 'Adresse de l\'utilisateur') }}
                    {{ Form::text('adress', $user->adress, ['class' => 'form-control', 'require']) }}
                    {{ $errors->first('adress', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('postal_code', 'Code postal') }}
                            {{ Form::text('postal_code', $user->postal_code, ['class' => 'form-control', 'require', 'maxlength' => 4]) }}
                            {{ $errors->first('postal_code', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {{ Form::label('city', 'Ville') }}
                            {{ Form::text('city', $user->city, ['class' => 'form-control', 'require']) }}
                            {{ $errors->first('city', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary pull-right">Éditer</button>
            </div>
        </div>
    {{ Form::close() }}
@stop
