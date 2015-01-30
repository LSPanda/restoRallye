@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
    <li class="active">Édition ({{ $user->email }})</li>
@stop

@section('content')
    {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'put']) }}
        <h2>Édition</h2>
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Nom') }}
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'require']) }}
                            {{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('surname', 'Prénom') }}
                            {{ Form::text('surname', $user->surname, ['class' => 'form-control', 'require']) }}
                            {{ $errors->first('surname', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('adress', 'Adresse de l\'utilisateur') }}
                    {{ Form::text('adress', $user->adress, ['class' => 'form-control']) }}
                    {{ $errors->first('adress', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('postal_code', 'Code postal') }}
                            {{ Form::text('postal_code', $user->postal_code, ['class' => 'form-control', 'maxlength' => 4]) }}
                            {{ $errors->first('postal_code', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {{ Form::label('city', 'Ville') }}
                            {{ Form::text('city', $user->city, ['class' => 'form-control']) }}
                            {{ $errors->first('city', '<div class="alert alert-danger">:message</div>') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', $user->email, ['class' => 'form-control', 'require']) }}
                    {{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Téléphone') }}
                    {{ Form::text('phone', $user->phone, ['class' => 'form-control']) }}
                    {{ $errors->first('phone', '<div class="alert alert-danger">:message</div>') }}
                </div>
                <div class="form-group">
                    {{ Form::label('gsm', 'GSM') }}
                    {{ Form::text('gsm', $user->gsm, ['class' => 'form-control']) }}
                    {{ $errors->first('gsm', '<div class="alert alert-danger">:message</div>') }}
                </div>
            </div>
        </div>
        <h2>Édition du mot de passe</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('password', 'Mot de passe') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('passwordConf', 'Confirmation du mot de passe') }}
                    {{ Form::password('passwordConf', ['class' => 'form-control']) }}
                    {{ $errors->first('passwordConf', '<div class="alert alert-danger">:message</div>') }}
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-lg btn-primary pull-right">Éditer</button>
    {{ Form::close() }}
@stop
