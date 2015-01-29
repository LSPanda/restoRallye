@extends('layouts.login')

@section('content')
    <div class="container">
        {{ Form::open(['route' => 'doLogin', 'class' => 'form-signin']) }}
        <h2 class="form-signin-heading">Connectez vous</h2>
            <p class="text-danger"><strong>{{ Session::get('message') }}</strong></p>
            {{ Form::email('email', null, [
                'placeholder'   => 'email@domaine.com',
                'class'         => 'form-control',
                'required'      => 'required',
                'autofocus'     => 'autofocus'
            ]) }}
            {{ $errors->first('email', '<span class="error-message">:message</span>') }}

            {{ Form::password('password', [
                'placeholder'   => 'Mot de passe',
                'class'         => 'form-control',
                'required'      => 'required'
            ]) }}
            {{ $errors->first('password', '<span class="error-message">:message</span>') }}

            {{ Form::submit('Connexion', ['class' => 'btn btn-lg btn-primary btn-block']) }}
        {{ Form::close() }}
    </div>
@stop
